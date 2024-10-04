<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['id' => 1, 'name' => 'Industrial Engineering'],
            ['id' => 2, 'name' => 'Management Engineering'],
            ['id' => 3, 'name' => 'Mechatronics Engineering'],
            ['id' => 4, 'name' => 'Software Engineering'],
            ['id' => 5, 'name' => 'Electrical And Electronics Engineering'],
            ['id' => 6, 'name' => 'Biomedical Engineering'],
            ['id' => 7, 'name' => 'Computer Engineering'],
            ['id' => 8, 'name' => 'Artificial Intelligence Engineering'],
            ['id' => 9, 'name' => 'Civil Engineering'],
            ['id' => 10, 'name' => 'Energy Systems Engineering']
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
