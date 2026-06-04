<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayrollRunSeeder extends Seeder
{
    public function run(): void
    {
        // 3 past payroll runs: March, April, May 2026 for all branches
        $runs = [];
        $periods = [
            ['month' => 3, 'year' => 2026, 'status' => 'PAID',      'processed_at' => '2026-03-25 09:00:00'],
            ['month' => 4, 'year' => 2026, 'status' => 'PAID',      'processed_at' => '2026-04-25 09:30:00'],
            ['month' => 5, 'year' => 2026, 'status' => 'PROCESSED', 'processed_at' => '2026-05-25 10:00:00'],
        ];

        foreach ($periods as $period) {
            foreach ([1, 2, 3] as $branchId) {
                $runs[] = [
                    'month'        => $period['month'],
                    'year'         => $period['year'],
                    'branch_id'    => $branchId,
                    'status'       => $period['status'],
                    'processed_at' => $period['processed_at'],
                ];
            }
        }

        DB::table('payroll_runs')->insert($runs);
    }
}
