<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryPaymentSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Payroll slips for March  (PAID):    slip IDs  1–31 → payroll_run 1–3
         * Payroll slips for April  (PAID):    slip IDs 32–62 → payroll_run 4–6
         * Payroll slips for May    (PROCESSED): slip IDs 63–93 → NOT paid yet
         *
         * We'll create bank transfer payments for March & April (62 slips).
         */
        $payments = [];
        $baseDate = '2026-03-25';

        for ($slipId = 1; $slipId <= 62; $slipId++) {
            $month     = $slipId <= 31 ? '2026-03-25' : '2026-04-25';
            $payments[] = [
                'payroll_slip_id'       => $slipId,
                'payment_method'        => 'BANK',
                'transaction_reference' => 'BOC-TRF-' . strtoupper(substr(md5($slipId . $month), 0, 10)),
                'paid_at'               => $month . ' 14:' . str_pad((($slipId - 1) % 60), 2, '0', STR_PAD_LEFT) . ':00',
            ];
        }

        foreach (array_chunk($payments, 50) as $chunk) {
            DB::table('salary_payments')->insert($chunk);
        }
    }
}
