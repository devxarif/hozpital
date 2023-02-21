<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $appends = ['format_date'];

    public function scopeCurrentDoctor($query)
    {
        return $query->where('doctor_id', currentDoctor()->id);
    }

    public function medicines()
    {
        return $this->hasMany(PrescriptionMedicine::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function getFormatDateAttribute()
    {
        if ($this->date) {
            return formatTime($this->date, 'd M Y');
        }

    }
}
