<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function reportingManager()
    {
        return $this->belongsTo(Employee::class, 'reporting_manager_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'reporting_manager_id');
    }

    public function documents()
    {
        return $this->hasMany(EmployeeDocument::class);
    }

    public function projectAssignments()
    {
        return $this->hasMany(ProjectAssignment::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }

    public function payrollSlips()
    {
        return $this->hasMany(PayrollSlip::class);
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }

    public function taxRecords()
    {
        return $this->hasMany(EmployeeTaxRecord::class);
    }

    public function bankDetail()
    {
        return $this->hasOne(EmployeeBankDetail::class);
    }

    public function salary()
    {
        return $this->hasOne(EmployeeSalary::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
