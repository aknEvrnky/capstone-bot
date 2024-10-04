<?php

namespace App\Console\Commands;

use App\CapstoneService\CapstoneClient;
use App\CapstoneService\FilterOptions;
use App\Models\AdvisorTrack;
use App\Models\Project;
use Illuminate\Console\Command;

class UpdateProjectsDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-projects-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the projects database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Updating projects database...');

        $client = new CapstoneClient();

        $client->login(config('services.bau.email'), config('services.bau.password'));

        $projects = $client->get(new FilterOptions());
        $this->output->progressStart(count($projects));

        foreach ($projects as $project) {
            $this->output->progressAdvance();
            Project::updateOrCreate(
                ['bau_id' => $project['id']],
                [
                    'title' => $project['title'],
                    'content' => $project['content'],
                ]
            );
        }

        $this->output->progressFinish();

        $this->info('Projects database updated.');
    }
}
