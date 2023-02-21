<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppointmentSchedule extends Model
{
    use HasFactory;

    public static array $diff_times = [5, 10, 15, 20, 30, 35, 40, 45, 50, 60];

    public function scopeCurrentDoctor($query)
    {
        return $query->where('doctor_id', currentDoctor()->id);
    }

    public function appointmentSlots(): HasMany
    {
        return $this->hasMany(AppointmentSlot::class);
    }
}
