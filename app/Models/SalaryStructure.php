<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryStructure extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $guarded = [];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function employeeSalaries()
    {
        return $this->hasMany(EmployeeSalary::class);
    }

}
