<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BloodDonation extends Model
{
    use HasFactory;

    public function bloodDonor(): BelongsTo
    {
        return $this->belongsTo(BloodDonor::class);
    }
}
