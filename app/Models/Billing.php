<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\BillingItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Billing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function billingItems()
    {
        return $this->hasMany(BillingItem::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
