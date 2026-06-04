<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * NexaSync Technologies (Pvt) Ltd – Startup Software Company
     * Seeding order respects foreign-key dependency chain.
     */
    public function run(): void
    {
        $this->call([
            // ── Core Configuration ────────────────────────────────────────────────
            SystemSettingSeeder::class,

            // ── Organisational Structure ──────────────────────────────────────────
            BranchSeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,

            // ── Employees ────────────────────────────────────────────────────────
            EmployeeSeeder::class,
            EmployeeDocumentSeeder::class,
            EmployeeBankDetailSeeder::class,

            // ── Projects & Timesheets ─────────────────────────────────────────────
            ProjectSeeder::class,
            ProjectAssignmentSeeder::class,
            AttendanceSeeder::class,
            TimesheetSeeder::class,

            // ── Payroll ───────────────────────────────────────────────────────────
            TaxTypeSeeder::class,
            SalaryStructureSeeder::class,
            EmployeeSalarySeeder::class,
            PayrollRunSeeder::class,
            PayrollSlipSeeder::class,
            BonusSeeder::class,
            DeductionSeeder::class,
            EmployeeTaxRecordSeeder::class,
            SalaryPaymentSeeder::class,

            // ── System Users & Audit ──────────────────────────────────────────────
            UserSeeder::class,
            AuditLogSeeder::class,
        ]);
    }
}
