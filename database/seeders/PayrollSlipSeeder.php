<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayrollSlipSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Payroll run IDs (from PayrollRunSeeder):
         *   1=Mar/Branch1, 2=Mar/Branch2, 3=Mar/Branch3
         *   4=Apr/Branch1, 5=Apr/Branch2, 6=Apr/Branch3
         *   7=May/Branch1, 8=May/Branch2, 9=May/Branch3
         *
         * Employee to branch mapping (simplified):
         *   Colombo (branch 1) → emp 1-21
         *   Kandy   (branch 2) → emp 22-27
         *   Galle   (branch 3) → emp 28-33
         *
         * Basic salaries (from SalaryStructureSeeder, matching designation order):
         */
        $empData = [
            // [emp_id, payroll_run_col_id, basic, allowance, overtime]
            // Colombo branch – run IDs 1,4,7
            [ 1,  1, 450000, 50000, 15000],
            [ 2,  1, 420000, 50000, 12000],
            [ 3,  1, 430000, 50000, 13000],
            [ 4,  1, 295000, 30000, 10000],
            [ 5,  1, 220000, 25000,  8000],
            [ 6,  1, 150000, 15000,  5000],
            [ 7,  1,  90000, 10000,  3000],
            [ 8,  1, 185000, 20000,  7000],
            [ 9,  1, 140000, 15000,  4500],
            [10,  1, 250000, 28000,  9000],
            [11,  1, 130000, 12000,  4000],
            [12,  1, 160000, 18000,  5500],
            [13,  1,  95000, 10000,  3000],
            [14,  1,  40000,  5000,     0],
            [15,  1, 200000, 22000,  6500],
            [16,  1, 120000, 12000,  4000],
            [17,  1, 260000, 30000,  9500],
            [18,  1, 100000, 10000,  3200],
            [19,  1, 110000, 12000,  3500],
            [20,  1, 160000, 18000,  5200],
            [21,  1,  90000,  9000,  2800],
            // Kandy branch – run IDs 2,5,8
            [22,  2, 210000, 22000,  7500],
            [23,  2, 145000, 15000,  4800],
            [24,  2, 145000, 15000,  4800],
            [25,  2, 170000, 18000,  5800],
            [26,  2, 115000, 12000,  3700],
            [27,  2, 130000, 13000,  4200],
            // Galle branch – run IDs 3,6,9
            [28,  3, 200000, 22000,  7000],
            [29,  3, 140000, 15000,  4500],
            [30,  3, 240000, 25000,  8500],
            [31,  3, 160000, 17000,  5500],
        ];

        $slips = [];

        // Generate slips for March (run +0), April (run +3), May (run +6)
        foreach ([0, 3, 6] as $runOffset) {
            $isPaid = ($runOffset < 6); // March & April are PAID, May is PROCESSED

            foreach ($empData as [$empId, $baseRunId, $basic, $allowance, $overtime]) {
                $runId = $baseRunId + $runOffset;
                $bonus        = ($runOffset === 3 && in_array($empId, [1, 2, 3, 4, 5])) ? 15000 : 0; // April bonus for seniors
                $deductions   = round($basic * 0.08, 2); // EPF 8%
                $gross        = $basic + $overtime + $allowance + $bonus;
                $net          = $gross - $deductions;

                $slips[] = [
                    'payroll_run_id'  => $runId,
                    'employee_id'     => $empId,
                    'basic_salary'    => $basic,
                    'overtime_pay'    => $overtime,
                    'allowance_total' => $allowance,
                    'bonus_total'     => $bonus,
                    'deduction_total' => $deductions,
                    'gross_salary'    => $gross,
                    'net_salary'      => $net,
                    'payment_status'  => $isPaid ? 'PAID' : 'PENDING',
                ];
            }
        }

        foreach (array_chunk($slips, 50) as $chunk) {
            DB::table('payroll_slips')->insert($chunk);
        }
    }
}
