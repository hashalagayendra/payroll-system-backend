<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tax_types')->insert([
            ['name' => 'EPF (Employee)',    'rate' => 8.00],
            ['name' => 'EPF (Employer)',    'rate' => 12.00],
            ['name' => 'ETF (Employer)',    'rate' => 3.00],
            ['name' => 'PAYE Tax',          'rate' => 0.00], // Variable – calculated per bracket
            ['name' => 'Stamp Duty',        'rate' => 0.50],
        ]);
    }
}
