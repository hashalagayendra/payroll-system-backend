<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('system_settings')->insert([
            'id'                        => 1,
            'company_name'              => 'NexaSync Technologies (Pvt) Ltd',
            'company_registration_no'   => 'PV/00125/2019',
            'tax_id'                    => 'VAT-LK-2019-08741',
            'address'                   => 'Level 7, Havelock City, 325 Havelock Road, Colombo 05, Sri Lanka',
            'email'                     => 'hr@nexasync.lk',
            'phone'                     => '+94 11 456 7890',
            'logo_url'                  => null,
            'currency_code'             => 'LKR',
            'currency_symbol'           => 'Rs.',
            'financial_year_start_month'=> 1,
            'payroll_day'               => 25,
            'epf_employee_rate'         => 8.00,
            'epf_employer_rate'         => 12.00,
            'etf_employer_rate'         => 3.00,
            'working_days_per_month'    => 22,
            'working_hours_per_day'     => 8,
            'overtime_rate_multiplier'  => 1.50,
            'created_at'                => now(),
            'updated_at'                => now(),
        ]);
    }
}
