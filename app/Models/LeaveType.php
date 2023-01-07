<?php

namespace App\Models;

use App\Models\LeaveBalance;
use App\Models\Organization;
use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveType extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'organization_id',
        'name',
        'slug',
        'color',
        'auto_approve',
        'balance',
        'status',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function leaveBalances()
    {
        return $this->hasMany(LeaveBalance::class, 'leave_type_id');
    }
}
