<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'employee_id'   => 1,  // Ashan Perera – CTO
                'email'         => 'ashan.perera@nexasync.lk',
                'password_hash' => Hash::make('Admin@1234'),
                'role'          => 'ADMIN',
                'last_login'    => now()->subHours(2),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'employee_id'   => 12, // Sandya Ranasinghe – HR Manager
                'email'         => 'sandya.r@nexasync.lk',
                'password_hash' => Hash::make('Hr@Nexasync2026'),
                'role'          => 'HR',
                'last_login'    => now()->subHours(1),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'employee_id'   => 3,  // Kavinda Fernando – CFO
                'email'         => 'kavinda.fernando@nexasync.lk',
                'password_hash' => Hash::make('Finance@2026!'),
                'role'          => 'ACCOUNTANT',
                'last_login'    => now()->subDays(1),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'employee_id'   => 4,  // Tharindu Silva – Eng Manager
                'email'         => 'tharindu.silva@nexasync.lk',
                'password_hash' => Hash::make('Manager@2026'),
                'role'          => 'MANAGER',
                'last_login'    => now()->subDays(1),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'employee_id'   => 17, // Harsha Alwis – VP Sales
                'email'         => 'harsha.alwis@nexasync.lk',
                'password_hash' => Hash::make('Sales@Nexasync1'),
                'role'          => 'MANAGER',
                'last_login'    => now()->subDays(2),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            // System admin (no employee record)
            [
                'employee_id'   => null,
                'email'         => 'sysadmin@nexasync.lk',
                'password_hash' => Hash::make('SysAdmin#Secure99'),
                'role'          => 'ADMIN',
                'last_login'    => now()->subDays(5),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
