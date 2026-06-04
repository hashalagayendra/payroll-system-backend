<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSalarySeeder extends Seeder
{
    public function run(): void
    {
        /*
         * salary_structure_id = designation_id of the employee
         * (both are in the same order from their seeders).
         * Map: employee → (designation_id, salary_structure_id, override if any)
         */
        $records = [
            // emp 1 – CTO (desig 1, struct 1)
            ['employee_id' => 1,  'salary_structure_id' => 1,  'basic_salary_override' => null,      'effective_from' => '2019-01-15', 'effective_to' => null],
            // emp 2 – CPO (desig 8, struct 8)
            ['employee_id' => 2,  'salary_structure_id' => 8,  'basic_salary_override' => null,      'effective_from' => '2019-03-01', 'effective_to' => null],
            // emp 3 – CFO (desig 17, struct 17)
            ['employee_id' => 3,  'salary_structure_id' => 17, 'basic_salary_override' => null,      'effective_from' => '2019-06-10', 'effective_to' => null],
            // emp 4 – Eng Manager (desig 2, struct 2)
            ['employee_id' => 4,  'salary_structure_id' => 2,  'basic_salary_override' => 295000.00, 'effective_from' => '2023-01-01', 'effective_to' => null],
            // emp 5 – Sr SW Eng (desig 3, struct 3)
            ['employee_id' => 5,  'salary_structure_id' => 3,  'basic_salary_override' => null,      'effective_from' => '2020-06-15', 'effective_to' => null],
            // emp 6 – SW Eng (desig 4, struct 4)
            ['employee_id' => 6,  'salary_structure_id' => 4,  'basic_salary_override' => null,      'effective_from' => '2021-03-10', 'effective_to' => null],
            // emp 7 – Assoc SW Eng (desig 5, struct 5)
            ['employee_id' => 7,  'salary_structure_id' => 5,  'basic_salary_override' => null,      'effective_from' => '2022-07-01', 'effective_to' => null],
            // emp 8 – DevOps Eng (desig 6, struct 6)
            ['employee_id' => 8,  'salary_structure_id' => 6,  'basic_salary_override' => 185000.00, 'effective_from' => '2022-01-01', 'effective_to' => null],
            // emp 9 – UI/UX Dev (desig 7, struct 7)
            ['employee_id' => 9,  'salary_structure_id' => 7,  'basic_salary_override' => null,      'effective_from' => '2021-09-01', 'effective_to' => null],
            // emp 10 – Sr PM (desig 9, struct 9)
            ['employee_id' => 10, 'salary_structure_id' => 9,  'basic_salary_override' => null,      'effective_from' => '2020-04-15', 'effective_to' => null],
            // emp 11 – UI/UX Designer (desig 11, struct 11)
            ['employee_id' => 11, 'salary_structure_id' => 11, 'basic_salary_override' => null,      'effective_from' => '2021-11-01', 'effective_to' => null],
            // emp 12 – HR Manager (desig 13, struct 13)
            ['employee_id' => 12, 'salary_structure_id' => 13, 'basic_salary_override' => null,      'effective_from' => '2019-08-01', 'effective_to' => null],
            // emp 13 – HR Executive (desig 14, struct 14)
            ['employee_id' => 13, 'salary_structure_id' => 14, 'basic_salary_override' => null,      'effective_from' => '2022-01-10', 'effective_to' => null],
            // emp 14 – HR Intern (desig 16, struct 16)
            ['employee_id' => 14, 'salary_structure_id' => 16, 'basic_salary_override' => null,      'effective_from' => '2024-06-01', 'effective_to' => null],
            // emp 15 – Finance Manager (desig 18, struct 18)
            ['employee_id' => 15, 'salary_structure_id' => 18, 'basic_salary_override' => null,      'effective_from' => '2020-09-01', 'effective_to' => null],
            // emp 16 – Accountant (desig 19, struct 19)
            ['employee_id' => 16, 'salary_structure_id' => 19, 'basic_salary_override' => null,      'effective_from' => '2021-05-15', 'effective_to' => null],
            // emp 17 – VP Sales (desig 21, struct 21)
            ['employee_id' => 17, 'salary_structure_id' => 21, 'basic_salary_override' => null,      'effective_from' => '2020-11-01', 'effective_to' => null],
            // emp 18 – Sales Exec (desig 23, struct 23)
            ['employee_id' => 18, 'salary_structure_id' => 23, 'basic_salary_override' => null,      'effective_from' => '2021-07-01', 'effective_to' => null],
            // emp 19 – Digital Mkt Specialist (desig 24, struct 24)
            ['employee_id' => 19, 'salary_structure_id' => 24, 'basic_salary_override' => null,      'effective_from' => '2022-03-14', 'effective_to' => null],
            // emp 20 – CS Manager (desig 25, struct 25)
            ['employee_id' => 20, 'salary_structure_id' => 25, 'basic_salary_override' => null,      'effective_from' => '2021-01-20', 'effective_to' => null],
            // emp 21 – CS Specialist (desig 26, struct 26)
            ['employee_id' => 21, 'salary_structure_id' => 26, 'basic_salary_override' => null,      'effective_from' => '2022-05-01', 'effective_to' => null],
            // emp 22 – Sr Backend Eng (desig 27, struct 27)
            ['employee_id' => 22, 'salary_structure_id' => 27, 'basic_salary_override' => null,      'effective_from' => '2020-08-01', 'effective_to' => null],
            // emp 23 – Backend Eng (desig 28, struct 28)
            ['employee_id' => 23, 'salary_structure_id' => 28, 'basic_salary_override' => null,      'effective_from' => '2021-04-12', 'effective_to' => null],
            // emp 24 – Mobile Dev (desig 29, struct 29)
            ['employee_id' => 24, 'salary_structure_id' => 29, 'basic_salary_override' => null,      'effective_from' => '2022-01-03', 'effective_to' => null],
            // emp 25 – QA Lead (desig 30, struct 30)
            ['employee_id' => 25, 'salary_structure_id' => 30, 'basic_salary_override' => null,      'effective_from' => '2021-02-15', 'effective_to' => null],
            // emp 26 – QA Eng (desig 31, struct 31)
            ['employee_id' => 26, 'salary_structure_id' => 31, 'basic_salary_override' => null,      'effective_from' => '2022-08-01', 'effective_to' => null],
            // emp 27 – Automation Test Eng (desig 32, struct 32)
            ['employee_id' => 27, 'salary_structure_id' => 32, 'basic_salary_override' => null,      'effective_from' => '2021-11-15', 'effective_to' => null],
            // emp 28 – Sr Frontend Eng (desig 33, struct 33)
            ['employee_id' => 28, 'salary_structure_id' => 33, 'basic_salary_override' => null,      'effective_from' => '2020-10-01', 'effective_to' => null],
            // emp 29 – Frontend Eng (desig 34, struct 34)
            ['employee_id' => 29, 'salary_structure_id' => 34, 'basic_salary_override' => null,      'effective_from' => '2022-02-07', 'effective_to' => null],
            // emp 30 – Data Scientist (desig 36, struct 36)
            ['employee_id' => 30, 'salary_structure_id' => 36, 'basic_salary_override' => null,      'effective_from' => '2021-06-01', 'effective_to' => null],
            // emp 31 – Data Eng (desig 37, struct 37)
            ['employee_id' => 31, 'salary_structure_id' => 37, 'basic_salary_override' => null,      'effective_from' => '2022-09-01', 'effective_to' => null],
            // emp 32 (resigned) – SW Eng (desig 4, struct 4)
            ['employee_id' => 32, 'salary_structure_id' => 4,  'basic_salary_override' => null,      'effective_from' => '2021-04-01', 'effective_to' => '2024-12-31'],
        ];

        foreach ($records as &$r) {
            $r['created_at'] = now();
        }

        DB::table('employee_salaries')->insert($records);
    }
}
