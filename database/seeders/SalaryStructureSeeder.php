<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryStructureSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Designation IDs and representative salary bands (LKR):
         *  1=CTO           → 450,000
         *  2=Eng Manager   → 280,000
         *  3=Sr SW Eng     → 220,000
         *  4=SW Eng        → 150,000
         *  5=Assoc SW Eng  → 90,000
         *  6=DevOps Eng    → 180,000
         *  7=UI/UX Dev     → 140,000
         *  8=CPO           → 420,000
         *  9=Sr PM         → 250,000
         * 10=PM            → 170,000
         * 11=UI/UX Designer→ 130,000
         * 12=Biz Analyst   → 110,000
         * 13=HR Manager    → 160,000
         * 14=HR Executive  → 95,000
         * 15=Talent Acq    → 100,000
         * 16=HR Intern     → 40,000
         * 17=CFO           → 430,000
         * 18=Finance Mgr   → 200,000
         * 19=Accountant    → 120,000
         * 20=Accounts Exec → 80,000
         * 21=VP Sales      → 260,000
         * 22=Sales Mgr     → 180,000
         * 23=Sales Exec    → 100,000
         * 24=Digital Mkt   → 110,000
         * 25=CS Manager    → 160,000
         * 26=CS Specialist → 90,000
         * 27=Sr Backend Eng→ 210,000
         * 28=Backend Eng   → 145,000
         * 29=Mobile Dev    → 145,000
         * 30=QA Lead       → 170,000
         * 31=QA Eng        → 115,000
         * 32=Auto Test Eng → 130,000
         * 33=Sr Frontend   → 200,000
         * 34=Frontend Eng  → 140,000
         * 35=API Integ Eng → 145,000
         * 36=Data Scientist→ 240,000
         * 37=Data Eng      → 160,000
         * 38=BI Analyst    → 110,000
         */
        $structures = [
            ['designation_id' =>  1, 'basic_salary' => 450000, 'overtime_rate' => 3500, 'allowance_default' => 50000],
            ['designation_id' =>  2, 'basic_salary' => 280000, 'overtime_rate' => 2200, 'allowance_default' => 30000],
            ['designation_id' =>  3, 'basic_salary' => 220000, 'overtime_rate' => 1700, 'allowance_default' => 25000],
            ['designation_id' =>  4, 'basic_salary' => 150000, 'overtime_rate' => 1150, 'allowance_default' => 15000],
            ['designation_id' =>  5, 'basic_salary' =>  90000, 'overtime_rate' =>  700, 'allowance_default' => 10000],
            ['designation_id' =>  6, 'basic_salary' => 180000, 'overtime_rate' => 1400, 'allowance_default' => 20000],
            ['designation_id' =>  7, 'basic_salary' => 140000, 'overtime_rate' => 1100, 'allowance_default' => 15000],
            ['designation_id' =>  8, 'basic_salary' => 420000, 'overtime_rate' => 3200, 'allowance_default' => 50000],
            ['designation_id' =>  9, 'basic_salary' => 250000, 'overtime_rate' => 1900, 'allowance_default' => 28000],
            ['designation_id' => 10, 'basic_salary' => 170000, 'overtime_rate' => 1300, 'allowance_default' => 18000],
            ['designation_id' => 11, 'basic_salary' => 130000, 'overtime_rate' => 1000, 'allowance_default' => 12000],
            ['designation_id' => 12, 'basic_salary' => 110000, 'overtime_rate' =>  850, 'allowance_default' => 10000],
            ['designation_id' => 13, 'basic_salary' => 160000, 'overtime_rate' => 1250, 'allowance_default' => 18000],
            ['designation_id' => 14, 'basic_salary' =>  95000, 'overtime_rate' =>  730, 'allowance_default' => 10000],
            ['designation_id' => 15, 'basic_salary' => 100000, 'overtime_rate' =>  780, 'allowance_default' => 10000],
            ['designation_id' => 16, 'basic_salary' =>  40000, 'overtime_rate' =>  300, 'allowance_default' =>  5000],
            ['designation_id' => 17, 'basic_salary' => 430000, 'overtime_rate' => 3300, 'allowance_default' => 50000],
            ['designation_id' => 18, 'basic_salary' => 200000, 'overtime_rate' => 1550, 'allowance_default' => 22000],
            ['designation_id' => 19, 'basic_salary' => 120000, 'overtime_rate' =>  930, 'allowance_default' => 12000],
            ['designation_id' => 20, 'basic_salary' =>  80000, 'overtime_rate' =>  615, 'allowance_default' =>  8000],
            ['designation_id' => 21, 'basic_salary' => 260000, 'overtime_rate' => 2000, 'allowance_default' => 30000],
            ['designation_id' => 22, 'basic_salary' => 180000, 'overtime_rate' => 1400, 'allowance_default' => 20000],
            ['designation_id' => 23, 'basic_salary' => 100000, 'overtime_rate' =>  780, 'allowance_default' => 10000],
            ['designation_id' => 24, 'basic_salary' => 110000, 'overtime_rate' =>  850, 'allowance_default' => 12000],
            ['designation_id' => 25, 'basic_salary' => 160000, 'overtime_rate' => 1250, 'allowance_default' => 18000],
            ['designation_id' => 26, 'basic_salary' =>  90000, 'overtime_rate' =>  700, 'allowance_default' =>  9000],
            ['designation_id' => 27, 'basic_salary' => 210000, 'overtime_rate' => 1620, 'allowance_default' => 22000],
            ['designation_id' => 28, 'basic_salary' => 145000, 'overtime_rate' => 1115, 'allowance_default' => 15000],
            ['designation_id' => 29, 'basic_salary' => 145000, 'overtime_rate' => 1115, 'allowance_default' => 15000],
            ['designation_id' => 30, 'basic_salary' => 170000, 'overtime_rate' => 1300, 'allowance_default' => 18000],
            ['designation_id' => 31, 'basic_salary' => 115000, 'overtime_rate' =>  890, 'allowance_default' => 12000],
            ['designation_id' => 32, 'basic_salary' => 130000, 'overtime_rate' => 1000, 'allowance_default' => 13000],
            ['designation_id' => 33, 'basic_salary' => 200000, 'overtime_rate' => 1550, 'allowance_default' => 22000],
            ['designation_id' => 34, 'basic_salary' => 140000, 'overtime_rate' => 1080, 'allowance_default' => 15000],
            ['designation_id' => 35, 'basic_salary' => 145000, 'overtime_rate' => 1115, 'allowance_default' => 15000],
            ['designation_id' => 36, 'basic_salary' => 240000, 'overtime_rate' => 1850, 'allowance_default' => 25000],
            ['designation_id' => 37, 'basic_salary' => 160000, 'overtime_rate' => 1250, 'allowance_default' => 17000],
            ['designation_id' => 38, 'basic_salary' => 110000, 'overtime_rate' =>  850, 'allowance_default' => 11000],
        ];

        foreach ($structures as &$s) {
            $s['created_at'] = now();
        }

        DB::table('salary_structures')->insert($structures);
    }
}
