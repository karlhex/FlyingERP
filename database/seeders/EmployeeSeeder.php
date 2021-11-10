<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\WorkExperience;
use App\Models\ProjectExperience;
use App\Models\Education;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Employee::factory(10)
             ->has(WorkExperience::factory()->count(3), 'work_experiences')
             ->has(ProjectExperience::factory()->count(3), 'project_experiences')
             ->has(Education::factory()->count(3), 'educations')
             ->has(Certificate::factory()->count(3), 'certificates')
             ->create();
    }
}
