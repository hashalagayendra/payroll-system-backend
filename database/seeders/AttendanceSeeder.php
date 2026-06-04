<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $statuses  = ['PRESENT', 'PRESENT', 'PRESENT', 'PRESENT', 'LATE', 'HALF_DAY', 'ABSENT'];
        $checkIns  = ['08:58', '09:01', '09:15', '08:45', '09:35', '10:05', '08:55'];
        $checkOuts = ['18:00', '17:55', '18:10', '17:45', '18:15', '13:30', '18:05'];

        $records = [];

        // Seed last 30 working days for first 15 employees
        $today = Carbon::today();
        for ($empId = 1; $empId <= 15; $empId++) {
            $daysBack = 0;
            $workDays = 0;
            while ($workDays < 30) {
                $date = $today->copy()->subDays($daysBack);
                // Skip weekends
                if ($date->isWeekend()) {
                    $daysBack++;
                    continue;
                }
                $idx = ($empId + $workDays) % count($statuses);
                $status = $statuses[$idx];
                $checkIn  = $status === 'ABSENT' ? null : $checkIns[$idx];
                $checkOut = $status === 'ABSENT' ? null : $checkOuts[$idx];
                $records[] = [
                    'employee_id' => $empId,
                    'date'        => $date->toDateString(),
                    'check_in'    => $checkIn,
                    'check_out'   => $checkOut,
                    'status'      => $status,
                ];
                $daysBack++;
                $workDays++;
            }
        }

        // Insert in chunks to avoid memory issues
        foreach (array_chunk($records, 100) as $chunk) {
            DB::table('attendance')->insert($chunk);
        }
    }
}
