<?php

namespace App\Models;

use App\Http\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory, HasUser;

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function appointmentSchedule(): HasMany
    {
        return $this->hasMany(AppointmentSchedule::class);
    }

    public function appointmentSlots()
    {
        return $this->hasManyThrough(AppointmentSlot::class, AppointmentSchedule::class);
    }
}
