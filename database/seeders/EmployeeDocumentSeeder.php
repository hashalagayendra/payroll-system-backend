<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeDocumentSeeder extends Seeder
{
    public function run(): void
    {
        $docs = [];
        // Seed NIC + Employment Contract for each of the first 20 employees
        for ($empId = 1; $empId <= 20; $empId++) {
            $docs[] = [
                'employee_id' => $empId,
                'type'        => 'NIC',
                'file_url'    => "https://storage.nexasync.lk/docs/emp_{$empId}_nic.pdf",
                'created_at'  => now(),
            ];
            $docs[] = [
                'employee_id' => $empId,
                'type'        => 'Employment Contract',
                'file_url'    => "https://storage.nexasync.lk/docs/emp_{$empId}_contract.pdf",
                'created_at'  => now(),
            ];
        }
        // Add passports for senior leadership
        foreach ([1, 2, 3, 17] as $empId) {
            $docs[] = [
                'employee_id' => $empId,
                'type'        => 'Passport',
                'file_url'    => "https://storage.nexasync.lk/docs/emp_{$empId}_passport.pdf",
                'created_at'  => now(),
            ];
        }
        DB::table('employee_documents')->insert($docs);
    }
}
