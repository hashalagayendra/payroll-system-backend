<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        // branch_id 1 = Colombo HQ, 2 = Kandy, 3 = Galle
        DB::table('departments')->insert([
            // Colombo HQ departments
            ['branch_id' => 1, 'name' => 'Engineering',          'description' => 'Software development, architecture, DevOps and QA teams.',          'created_at' => now()],
            ['branch_id' => 1, 'name' => 'Product Management',   'description' => 'Product strategy, roadmap planning and UX/UI design.',               'created_at' => now()],
            ['branch_id' => 1, 'name' => 'Human Resources',      'description' => 'Talent acquisition, employee relations and payroll management.',     'created_at' => now()],
            ['branch_id' => 1, 'name' => 'Finance & Accounting', 'description' => 'Financial planning, accounting, tax compliance and auditing.',       'created_at' => now()],
            ['branch_id' => 1, 'name' => 'Sales & Marketing',    'description' => 'Business development, client acquisition and brand management.',    'created_at' => now()],
            ['branch_id' => 1, 'name' => 'Customer Success',     'description' => 'Onboarding, support and client relationship management.',           'created_at' => now()],

            // Kandy Office departments
            ['branch_id' => 2, 'name' => 'Engineering',          'description' => 'Backend and mobile development team based in Kandy.',                'created_at' => now()],
            ['branch_id' => 2, 'name' => 'Quality Assurance',    'description' => 'Testing, automation and quality control for all products.',          'created_at' => now()],

            // Galle Tech Hub departments
            ['branch_id' => 3, 'name' => 'Engineering',          'description' => 'Frontend and API development team based in Galle.',                  'created_at' => now()],
            ['branch_id' => 3, 'name' => 'Data & Analytics',     'description' => 'Data engineering, BI reporting and machine-learning initiatives.',   'created_at' => now()],
        ]);
    }
}
