<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BonusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bonuses')->insert([
            // Q1 Performance Bonus – April 2026 (seniors)
            ['employee_id' => 1,  'title' => 'Q1 Performance Bonus', 'amount' => 75000, 'month' => 4, 'year' => 2026, 'reason' => 'Exceptional leadership in product delivery and team mentoring.'],
            ['employee_id' => 2,  'title' => 'Q1 Performance Bonus', 'amount' => 70000, 'month' => 4, 'year' => 2026, 'reason' => 'Outstanding product strategy and roadmap execution.'],
            ['employee_id' => 3,  'title' => 'Q1 Performance Bonus', 'amount' => 70000, 'month' => 4, 'year' => 2026, 'reason' => 'Strong financial planning and successful audit closure.'],
            ['employee_id' => 4,  'title' => 'Q1 Performance Bonus', 'amount' => 40000, 'month' => 4, 'year' => 2026, 'reason' => 'Successful delivery of NexaHR platform Phase 1 on time.'],
            ['employee_id' => 5,  'title' => 'Q1 Performance Bonus', 'amount' => 30000, 'month' => 4, 'year' => 2026, 'reason' => 'Key contributor to FinTrack 360 successful go-live.'],

            // Project Completion Bonus – FinTrack 360
            ['employee_id' => 22, 'title' => 'Project Completion Bonus', 'amount' => 25000, 'month' => 3, 'year' => 2026, 'reason' => 'FinTrack 360 project completed ahead of schedule.'],
            ['employee_id' => 32, 'title' => 'Project Completion Bonus', 'amount' => 20000, 'month' => 3, 'year' => 2026, 'reason' => 'Data pipeline implementation for FinTrack 360.'],

            // Annual Increment Bonus
            ['employee_id' => 10, 'title' => 'Annual Increment Bonus',  'amount' => 20000, 'month' => 1, 'year' => 2026, 'reason' => 'Annual performance increment – Senior Product Manager.'],
            ['employee_id' => 17, 'title' => 'Sales Achievement Bonus', 'amount' => 50000, 'month' => 5, 'year' => 2026, 'reason' => 'Exceeded Q2 sales target by 35%.'],
            ['employee_id' => 18, 'title' => 'Sales Achievement Bonus', 'amount' => 15000, 'month' => 5, 'year' => 2026, 'reason' => 'Closed 3 new enterprise client contracts this quarter.'],

            // Referral Bonus
            ['employee_id' => 8,  'title' => 'Employee Referral Bonus', 'amount' => 10000, 'month' => 2, 'year' => 2026, 'reason' => 'Successful referral hire – Automation Test Engineer.'],
        ]);
    }
}
