<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTaxRecordSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Tax type IDs: 1=EPF(Emp), 2=EPF(Employer), 3=ETF, 4=PAYE, 5=StampDuty
         * Salaries for sample employees:
         *   emp 1=450000, emp 2=420000, emp 3=430000, emp 4=295000, emp 5=220000
         *   emp 17=260000, emp 22=210000
         */
        $records = [];

        $salaries = [
            1 => 450000, 2 => 420000, 3 => 430000,
            4 => 295000, 5 => 220000, 17 => 260000, 22 => 210000,
        ];

        $months = [
            ['month' => 3, 'year' => 2026],
            ['month' => 4, 'year' => 2026],
            ['month' => 5, 'year' => 2026],
        ];

        foreach ($months as $period) {
            foreach ($salaries as $empId => $basic) {
                // EPF Employee 8%
                $records[] = [
                    'employee_id' => $empId,
                    'tax_type_id' => 1,
                    'amount'      => round($basic * 0.08, 2),
                    'month'       => $period['month'],
                    'year'        => $period['year'],
                ];
                // EPF Employer 12%
                $records[] = [
                    'employee_id' => $empId,
                    'tax_type_id' => 2,
                    'amount'      => round($basic * 0.12, 2),
                    'month'       => $period['month'],
                    'year'        => $period['year'],
                ];
                // ETF Employer 3%
                $records[] = [
                    'employee_id' => $empId,
                    'tax_type_id' => 3,
                    'amount'      => round($basic * 0.03, 2),
                    'month'       => $period['month'],
                    'year'        => $period['year'],
                ];
                // PAYE – simplified: 18% on amount above 250k
                $taxableIncome = max(0, $basic - 250000);
                if ($taxableIncome > 0) {
                    $records[] = [
                        'employee_id' => $empId,
                        'tax_type_id' => 4,
                        'amount'      => round($taxableIncome * 0.18, 2),
                        'month'       => $period['month'],
                        'year'        => $period['year'],
                    ];
                }
            }
        }

        DB::table('employee_tax_records')->insert($records);
    }
}
