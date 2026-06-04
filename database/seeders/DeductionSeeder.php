<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeductionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('deductions')->insert([
            // Salary advance repayments
            ['employee_id' => 6,  'title' => 'Salary Advance Repayment', 'amount' => 10000, 'month' => 3, 'year' => 2026],
            ['employee_id' => 6,  'title' => 'Salary Advance Repayment', 'amount' => 10000, 'month' => 4, 'year' => 2026],
            ['employee_id' => 6,  'title' => 'Salary Advance Repayment', 'amount' => 10000, 'month' => 5, 'year' => 2026],

            // Medical insurance premium (employee contribution)
            ['employee_id' => 1,  'title' => 'Medical Insurance Premium', 'amount' => 5000, 'month' => 3, 'year' => 2026],
            ['employee_id' => 2,  'title' => 'Medical Insurance Premium', 'amount' => 5000, 'month' => 3, 'year' => 2026],
            ['employee_id' => 3,  'title' => 'Medical Insurance Premium', 'amount' => 5000, 'month' => 3, 'year' => 2026],
            ['employee_id' => 4,  'title' => 'Medical Insurance Premium', 'amount' => 5000, 'month' => 3, 'year' => 2026],
            ['employee_id' => 5,  'title' => 'Medical Insurance Premium', 'amount' => 5000, 'month' => 3, 'year' => 2026],

            // Parking fee
            ['employee_id' => 1,  'title' => 'Monthly Parking Fee', 'amount' => 3500, 'month' => 3, 'year' => 2026],
            ['employee_id' => 4,  'title' => 'Monthly Parking Fee', 'amount' => 3500, 'month' => 3, 'year' => 2026],
            ['employee_id' => 10, 'title' => 'Monthly Parking Fee', 'amount' => 3500, 'month' => 3, 'year' => 2026],

            // Equipment damage (laptop)
            ['employee_id' => 13, 'title' => 'Equipment Damage Deduction', 'amount' => 8000, 'month' => 4, 'year' => 2026],

            // Unpaid leave deduction (half days)
            ['employee_id' => 7,  'title' => 'Unpaid Leave Deduction (2 days)', 'amount' => 8182, 'month' => 5, 'year' => 2026],
            ['employee_id' => 14, 'title' => 'Unpaid Leave Deduction (1 day)',  'amount' => 1818, 'month' => 5, 'year' => 2026],
        ]);
    }
}
