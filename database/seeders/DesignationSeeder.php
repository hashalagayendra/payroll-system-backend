<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Dept IDs (from DepartmentSeeder insertion order):
         *  1 = Engineering (Colombo)
         *  2 = Product Management (Colombo)
         *  3 = Human Resources (Colombo)
         *  4 = Finance & Accounting (Colombo)
         *  5 = Sales & Marketing (Colombo)
         *  6 = Customer Success (Colombo)
         *  7 = Engineering (Kandy)
         *  8 = Quality Assurance (Kandy)
         *  9 = Engineering (Galle)
         * 10 = Data & Analytics (Galle)
         */

        DB::table('designations')->insert([
            // Engineering – Colombo (dept 1)
            ['department_id' => 1, 'title' => 'Chief Technology Officer',    'level' => 'Executive'],
            ['department_id' => 1, 'title' => 'Engineering Manager',          'level' => 'Senior'],
            ['department_id' => 1, 'title' => 'Senior Software Engineer',     'level' => 'Senior'],
            ['department_id' => 1, 'title' => 'Software Engineer',            'level' => 'Mid'],
            ['department_id' => 1, 'title' => 'Associate Software Engineer',  'level' => 'Junior'],
            ['department_id' => 1, 'title' => 'DevOps Engineer',              'level' => 'Mid'],
            ['department_id' => 1, 'title' => 'UI/UX Developer',              'level' => 'Mid'],

            // Product Management – Colombo (dept 2)
            ['department_id' => 2, 'title' => 'Chief Product Officer',        'level' => 'Executive'],
            ['department_id' => 2, 'title' => 'Senior Product Manager',       'level' => 'Senior'],
            ['department_id' => 2, 'title' => 'Product Manager',              'level' => 'Mid'],
            ['department_id' => 2, 'title' => 'UI/UX Designer',               'level' => 'Mid'],
            ['department_id' => 2, 'title' => 'Business Analyst',             'level' => 'Junior'],

            // Human Resources – Colombo (dept 3)
            ['department_id' => 3, 'title' => 'HR Manager',                   'level' => 'Senior'],
            ['department_id' => 3, 'title' => 'HR Executive',                 'level' => 'Mid'],
            ['department_id' => 3, 'title' => 'Talent Acquisition Specialist','level' => 'Mid'],
            ['department_id' => 3, 'title' => 'HR Intern',                    'level' => 'Junior'],

            // Finance & Accounting – Colombo (dept 4)
            ['department_id' => 4, 'title' => 'Chief Financial Officer',      'level' => 'Executive'],
            ['department_id' => 4, 'title' => 'Finance Manager',              'level' => 'Senior'],
            ['department_id' => 4, 'title' => 'Accountant',                   'level' => 'Mid'],
            ['department_id' => 4, 'title' => 'Accounts Executive',           'level' => 'Junior'],

            // Sales & Marketing – Colombo (dept 5)
            ['department_id' => 5, 'title' => 'VP of Sales',                  'level' => 'Senior'],
            ['department_id' => 5, 'title' => 'Sales Manager',                'level' => 'Senior'],
            ['department_id' => 5, 'title' => 'Sales Executive',              'level' => 'Mid'],
            ['department_id' => 5, 'title' => 'Digital Marketing Specialist', 'level' => 'Mid'],

            // Customer Success – Colombo (dept 6)
            ['department_id' => 6, 'title' => 'Customer Success Manager',     'level' => 'Senior'],
            ['department_id' => 6, 'title' => 'Customer Support Specialist',  'level' => 'Mid'],

            // Engineering – Kandy (dept 7)
            ['department_id' => 7, 'title' => 'Senior Backend Engineer',      'level' => 'Senior'],
            ['department_id' => 7, 'title' => 'Backend Engineer',             'level' => 'Mid'],
            ['department_id' => 7, 'title' => 'Mobile Developer',             'level' => 'Mid'],

            // Quality Assurance – Kandy (dept 8)
            ['department_id' => 8, 'title' => 'QA Lead',                      'level' => 'Senior'],
            ['department_id' => 8, 'title' => 'QA Engineer',                  'level' => 'Mid'],
            ['department_id' => 8, 'title' => 'Automation Test Engineer',     'level' => 'Mid'],

            // Engineering – Galle (dept 9)
            ['department_id' => 9, 'title' => 'Senior Frontend Engineer',     'level' => 'Senior'],
            ['department_id' => 9, 'title' => 'Frontend Engineer',            'level' => 'Mid'],
            ['department_id' => 9, 'title' => 'API Integration Engineer',     'level' => 'Mid'],

            // Data & Analytics – Galle (dept 10)
            ['department_id' => 10, 'title' => 'Data Scientist',               'level' => 'Senior'],
            ['department_id' => 10, 'title' => 'Data Engineer',                'level' => 'Mid'],
            ['department_id' => 10, 'title' => 'BI Analyst',                   'level' => 'Junior'],
        ]);
    }
}
