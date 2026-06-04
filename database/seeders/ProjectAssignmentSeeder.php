<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectAssignmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('project_assignments')->insert([
            // Project 1 – NexaHR (Internal)
            ['project_id' => 1, 'employee_id' => 4,  'role' => 'Tech Lead'],
            ['project_id' => 1, 'employee_id' => 5,  'role' => 'Backend Developer'],
            ['project_id' => 1, 'employee_id' => 6,  'role' => 'Backend Developer'],
            ['project_id' => 1, 'employee_id' => 9,  'role' => 'UI Developer'],
            ['project_id' => 1, 'employee_id' => 8,  'role' => 'DevOps Engineer'],
            ['project_id' => 1, 'employee_id' => 26, 'role' => 'QA Engineer'],

            // Project 2 – FinTrack 360 (Completed)
            ['project_id' => 2, 'employee_id' => 5,  'role' => 'Senior Developer'],
            ['project_id' => 2, 'employee_id' => 22, 'role' => 'Backend Engineer'],
            ['project_id' => 2, 'employee_id' => 32, 'role' => 'Data Engineer'],

            // Project 3 – ShopNest Mobile App
            ['project_id' => 3, 'employee_id' => 23, 'role' => 'Mobile Developer'],
            ['project_id' => 3, 'employee_id' => 24, 'role' => 'Backend Engineer'],
            ['project_id' => 3, 'employee_id' => 30, 'role' => 'Frontend Engineer'],
            ['project_id' => 3, 'employee_id' => 26, 'role' => 'QA Lead'],

            // Project 4 – AgriSense IoT
            ['project_id' => 4, 'employee_id' => 22, 'role' => 'Backend Tech Lead'],
            ['project_id' => 4, 'employee_id' => 23, 'role' => 'Mobile Developer'],
            ['project_id' => 4, 'employee_id' => 31, 'role' => 'Data Engineer'],
            ['project_id' => 4, 'employee_id' => 32, 'role' => 'BI Analyst'],

            // Project 5 – MediSync (Completed)
            ['project_id' => 5, 'employee_id' => 4,  'role' => 'Engineering Lead'],
            ['project_id' => 5, 'employee_id' => 6,  'role' => 'Backend Developer'],
            ['project_id' => 5, 'employee_id' => 30, 'role' => 'Frontend Developer'],

            // Project 6 – LogiFlow
            ['project_id' => 6, 'employee_id' => 5,  'role' => 'Senior Developer'],
            ['project_id' => 6, 'employee_id' => 30, 'role' => 'Frontend Engineer'],
            ['project_id' => 6, 'employee_id' => 31, 'role' => 'API Engineer'],
            ['project_id' => 6, 'employee_id' => 27, 'role' => 'QA Engineer'],

            // Project 7 – EduPulse (On Hold)
            ['project_id' => 7, 'employee_id' => 9,  'role' => 'UI/UX Developer'],
            ['project_id' => 7, 'employee_id' => 11, 'role' => 'UI Designer'],
        ]);
    }
}
