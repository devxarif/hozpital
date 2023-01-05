<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HolidayRequest extends Model
{
    use HasFactory;



    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
