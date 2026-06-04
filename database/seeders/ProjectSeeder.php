<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name'         => 'NexaHR – Internal HR & Payroll Platform',
                'client_name'  => 'Internal',
                'start_date'   => '2024-01-01',
                'end_date'     => null,
                'status'       => 'ACTIVE',
                'billing_type' => 'FIXED',
                'created_at'   => now(),
            ],
            [
                'name'         => 'FinTrack 360 – FinTech Dashboard',
                'client_name'  => 'ClearBank Digital (Pvt) Ltd',
                'start_date'   => '2024-03-15',
                'end_date'     => '2025-03-14',
                'status'       => 'COMPLETED',
                'billing_type' => 'FIXED',
                'created_at'   => now(),
            ],
            [
                'name'         => 'ShopNest – E-Commerce Mobile App',
                'client_name'  => 'MegaMart Lanka',
                'start_date'   => '2024-07-01',
                'end_date'     => null,
                'status'       => 'ACTIVE',
                'billing_type' => 'HOURLY',
                'created_at'   => now(),
            ],
            [
                'name'         => 'AgriSense – IoT Farm Management System',
                'client_name'  => 'GreenField Agro (Pvt) Ltd',
                'start_date'   => '2025-01-10',
                'end_date'     => null,
                'status'       => 'ACTIVE',
                'billing_type' => 'FIXED',
                'created_at'   => now(),
            ],
            [
                'name'         => 'MediSync – Hospital Information System',
                'client_name'  => 'National Medical Group',
                'start_date'   => '2023-06-01',
                'end_date'     => '2024-05-31',
                'status'       => 'COMPLETED',
                'billing_type' => 'FIXED',
                'created_at'   => now(),
            ],
            [
                'name'         => 'LogiFlow – Logistics & Delivery Tracker',
                'client_name'  => 'SwiftCargo Lanka',
                'start_date'   => '2025-02-15',
                'end_date'     => null,
                'status'       => 'ACTIVE',
                'billing_type' => 'HOURLY',
                'created_at'   => now(),
            ],
            [
                'name'         => 'EduPulse – Learning Management System',
                'client_name'  => 'BrightPath Education',
                'start_date'   => '2024-11-01',
                'end_date'     => null,
                'status'       => 'ON_HOLD',
                'billing_type' => 'FIXED',
                'created_at'   => now(),
            ],
        ]);
    }
}
