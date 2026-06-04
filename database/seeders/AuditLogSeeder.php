<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuditLogSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('audit_logs')->insert([
            // Login events
            ['user_id' => 1, 'action' => 'USER_LOGIN',          'entity_type' => 'users',    'entity_id' => 1,  'ip_address' => '192.168.1.10', 'created_at' => now()->subHours(2)],
            ['user_id' => 2, 'action' => 'USER_LOGIN',          'entity_type' => 'users',    'entity_id' => 2,  'ip_address' => '192.168.1.15', 'created_at' => now()->subHours(1)],
            ['user_id' => 3, 'action' => 'USER_LOGIN',          'entity_type' => 'users',    'entity_id' => 3,  'ip_address' => '10.0.0.5',     'created_at' => now()->subDays(1)],

            // Employee management
            ['user_id' => 2, 'action' => 'EMPLOYEE_CREATED',    'entity_type' => 'employees','entity_id' => 14, 'ip_address' => '192.168.1.15', 'created_at' => now()->subDays(4)],
            ['user_id' => 2, 'action' => 'EMPLOYEE_UPDATED',    'entity_type' => 'employees','entity_id' => 6,  'ip_address' => '192.168.1.15', 'created_at' => now()->subDays(3)],
            ['user_id' => 2, 'action' => 'EMPLOYEE_STATUS_CHANGED', 'entity_type' => 'employees', 'entity_id' => 32, 'ip_address' => '192.168.1.15', 'created_at' => now()->subDays(10)],

            // Payroll events
            ['user_id' => 3, 'action' => 'PAYROLL_RUN_CREATED', 'entity_type' => 'payroll_runs', 'entity_id' => 7, 'ip_address' => '10.0.0.5', 'created_at' => now()->subDays(10)],
            ['user_id' => 3, 'action' => 'PAYROLL_PROCESSED',   'entity_type' => 'payroll_runs', 'entity_id' => 7, 'ip_address' => '10.0.0.5', 'created_at' => now()->subDays(10)],
            ['user_id' => 3, 'action' => 'PAYROLL_PAID',        'entity_type' => 'payroll_runs', 'entity_id' => 4, 'ip_address' => '10.0.0.5', 'created_at' => now()->subMonths(1)->subDays(6)],
            ['user_id' => 3, 'action' => 'PAYROLL_PAID',        'entity_type' => 'payroll_runs', 'entity_id' => 1, 'ip_address' => '10.0.0.5', 'created_at' => now()->subMonths(2)->subDays(6)],

            // Salary structure update
            ['user_id' => 1, 'action' => 'SALARY_STRUCTURE_UPDATED', 'entity_type' => 'salary_structures', 'entity_id' => 2, 'ip_address' => '192.168.1.10', 'created_at' => now()->subDays(14)],

            // Bonus approved
            ['user_id' => 1, 'action' => 'BONUS_APPROVED',      'entity_type' => 'bonuses',  'entity_id' => 1,  'ip_address' => '192.168.1.10', 'created_at' => now()->subDays(40)],
            ['user_id' => 1, 'action' => 'BONUS_APPROVED',      'entity_type' => 'bonuses',  'entity_id' => 2,  'ip_address' => '192.168.1.10', 'created_at' => now()->subDays(40)],

            // Document uploaded
            ['user_id' => 2, 'action' => 'DOCUMENT_UPLOADED',   'entity_type' => 'employee_documents', 'entity_id' => 28, 'ip_address' => '192.168.1.15', 'created_at' => now()->subDays(20)],

            // System settings update
            ['user_id' => 1, 'action' => 'SYSTEM_SETTINGS_UPDATED', 'entity_type' => 'system_settings', 'entity_id' => 1, 'ip_address' => '192.168.1.10', 'created_at' => now()->subMonths(3)],
        ]);
    }
}
