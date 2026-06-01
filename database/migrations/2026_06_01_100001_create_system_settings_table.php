<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->primary()->default(1);
            $table->string('company_name', 255);
            $table->string('company_registration_no', 100)->nullable();
            $table->string('tax_id', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('logo_url', 500)->nullable();
            $table->string('currency_code', 10)->default('LKR');
            $table->string('currency_symbol', 5)->default('Rs.');
            $table->unsignedTinyInteger('financial_year_start_month')->default(1);
            $table->unsignedTinyInteger('payroll_day')->default(25);
            $table->decimal('epf_employee_rate', 5, 2)->default(8.00);
            $table->decimal('epf_employer_rate', 5, 2)->default(12.00);
            $table->decimal('etf_employer_rate', 5, 2)->default(3.00);
            $table->unsignedTinyInteger('working_days_per_month')->default(22);
            $table->unsignedTinyInteger('working_hours_per_day')->default(8);
            $table->decimal('overtime_rate_multiplier', 4, 2)->default(1.50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
