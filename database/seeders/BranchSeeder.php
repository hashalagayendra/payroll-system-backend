<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'name'       => 'Colombo HQ',
                'address'    => 'Level 7, Havelock City, 325 Havelock Road, Colombo 05, Sri Lanka',
                'phone'      => '+94 11 456 7890',
                'created_at' => now(),
            ],
            [
                'name'       => 'Kandy Office',
                'address'    => '3rd Floor, Empire Centre, 32 Deva Veediya, Kandy 20000, Sri Lanka',
                'phone'      => '+94 81 234 5678',
                'created_at' => now(),
            ],
            [
                'name'       => 'Galle Tech Hub',
                'address'    => '12 Lighthouse Street, Galle Fort, Galle 80000, Sri Lanka',
                'phone'      => '+94 91 223 4456',
                'created_at' => now(),
            ],
        ]);
    }
}
