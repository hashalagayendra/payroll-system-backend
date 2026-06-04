<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimesheetSeeder extends Seeder
{
    public function run(): void
    {
        $tasks = [
            'Implemented REST API endpoints for user management module',
            'Resolved critical bug in payment gateway integration',
            'Code review and feedback for junior developers',
            'Updated CI/CD pipeline configuration on GitHub Actions',
            'Designed database schema for new reporting feature',
            'Wrote unit tests for authentication service',
            'Optimised SQL queries for dashboard performance',
            'Client meeting preparation and demo setup',
            'Developed React components for admin panel',
            'Integrated third-party SMS notification service',
            'Deployed hotfix to production environment',
            'Sprint planning and backlog grooming session',
        ];

        // employee_id → project_ids they are assigned to
        $assignments = [
            4  => [1, 5],
            5  => [1, 2, 6],
            6  => [1, 5],
            8  => [1],
            9  => [1, 7],
            22 => [2, 4],
            23 => [3, 4],
            24 => [3],
            26 => [3, 6],
            27 => [6],
            30 => [3, 5, 6],
            31 => [4, 6],
            32 => [4],
        ];

        $records = [];
        $today   = Carbon::today();

        foreach ($assignments as $empId => $projectIds) {
            for ($i = 0; $i < 20; $i++) {
                $projectId   = $projectIds[$i % count($projectIds)];
                $workDate    = $today->copy()->subDays(($i * 2) + 1);
                // Skip weekends
                while ($workDate->isWeekend()) {
                    $workDate->subDay();
                }
                $records[] = [
                    'employee_id'     => $empId,
                    'project_id'      => $projectId,
                    'task_description'=> $tasks[$i % count($tasks)],
                    'work_date'       => $workDate->toDateString(),
                    'hours_worked'    => round(rand(3, 8) + (rand(0, 1) * 0.5), 1),
                    'billable'        => ($projectId !== 1) ? 1 : 0, // internal project not billable
                ];
            }
        }

        foreach (array_chunk($records, 100) as $chunk) {
            DB::table('timesheets')->insert($chunk);
        }
    }
}
