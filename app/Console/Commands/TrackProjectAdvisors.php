<?php

namespace App\Console\Commands;

use App\CapstoneService\CapstoneClient;
use App\CapstoneService\FilterOptions;
use App\Models\AdvisorTrack;
use App\Models\Project;
use App\Models\User;
use App\Notifications\NewProjectNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class TrackProjectAdvisors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:track-project-advisors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $tracks = AdvisorTrack::all();

        $client = new CapstoneClient();
        $client->login(config('services.bau.email'), config('services.bau.password'));

        foreach ($tracks as $track) {
            $options = new FilterOptions(
                department_ids: [$track->department_id],
                advisor_ids: [$track->advisor_id]
            );

            $projects = $client->get($options);

            foreach ($projects as $project) {
                Project::where('bau_id', $project['id'])
                    ->firstOr(function () use ($project) {
                        $project = Project::create([
                            'bau_id' => $project['id'],
                            'title' => $project['title'],
                            'content' => $project['content'],
                        ]);

                        Notification::send(User::all(), new NewProjectNotification($project));

                        return $project;
                    });
            }
        }
    }
}
