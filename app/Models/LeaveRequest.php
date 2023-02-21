<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leave_type_id',
        'start',
        'end',
        'days',
        'reason',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function scopeOrganizationEmployeeReport($query, $organization_id, $employee_id)
    {
        return $query->with(['employee.user', 'employee.team', 'organization.user', 'leaveType'])
        ->where('organization_id', $organization_id)
        ->where('employee_id', $employee_id);
    }

    public function scopeUserReport($query, $user_id)
    {
        return $query->with(['leaveType'])
        ->where('user_id', $user_id);
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month);
    }

    public function scopeLastMonth($query)
    {
        return $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
    }

    public function scopeLast6Month($query)
    {
        return $query->whereBetween('created_at', [now()->subMonth(6), now()]);
    }

    public function scopeThisYear($query)
    {
        return $query->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()]);
    }

    public function scopeLastYear($query)
    {
        return $query->whereDate('created_at', '>', now()->subYear());
    }

    public function scopeCustomDate($query, $date)
    {
        return $query->whereDate('created_at', $date);
    }

    public function scopeCustomRangeDate($query, $start_date, $end_date)
    {
        return $query->whereDate('created_at', '>=', $start_date)
        ->whereDate('created_at', '<=', $end_date);
    }
}
