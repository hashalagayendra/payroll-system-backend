<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeBankDetailSeeder extends Seeder
{
    public function run(): void
    {
        $banks = [
            ['bank' => 'Bank of Ceylon',         'swift' => 'BCEYLKLX'],
            ['bank' => 'Commercial Bank',         'swift' => 'CCEYLKLX'],
            ['bank' => "People's Bank",           'swift' => 'PSBKLKLX'],
            ['bank' => 'Hatton National Bank',    'swift' => 'HBLILKLX'],
            ['bank' => 'Sampath Bank',            'swift' => 'BSAMLKLX'],
            ['bank' => 'Nations Trust Bank',      'swift' => 'NTBKLKLX'],
            ['bank' => 'Seylan Bank',             'swift' => 'SEYLLKLX'],
        ];

        $branches = [
            'Colombo Main', 'Kandy Branch', 'Galle Branch',
            'Nugegoda Branch', 'Nawala Branch', 'Dehiwala Branch',
        ];

        $records = [];
        for ($empId = 1; $empId <= 32; $empId++) {
            $bank = $banks[($empId - 1) % count($banks)];
            $branchName = $branches[($empId - 1) % count($branches)];
            $records[] = [
                'employee_id'    => $empId,
                'bank_name'      => $bank['bank'],
                'account_number' => str_pad((string)($empId * 1000000 + rand(100000, 999999)), 12, '0', STR_PAD_LEFT),
                'branch_name'    => $branchName,
                'swift_code'     => $bank['swift'],
            ];
        }

        DB::table('employee_bank_details')->insert($records);
    }
}
