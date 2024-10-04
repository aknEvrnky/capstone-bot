<?php

namespace Database\Factories;

use App\Models\Advisor;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdvisorTrack>
 */
class AdvisorTrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'advisor_id' => Advisor::factory(),
            'department_id' => Department::factory(),
        ];
    }
}
