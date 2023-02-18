<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $appends = ['format_date'];

    public function scopeCurrentDoctor($query)
    {
        return $query->where('doctor_id', currentDoctor()->id);
    }

    public function scopeCurrentPatient($query)
    {
        return $query->where('patient_id', currentDoctor()->id);
    }

    public function getFormatDateAttribute()
    {
        return formatTime($this->date, 'l d M Y');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
