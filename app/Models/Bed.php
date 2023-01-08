<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bed extends Model
{
    use HasFactory;

    public const Floor = [
        '1st Floor',
        '2nd Floor',
        '3rd Floor',
        '4th Floor',
        '5th Floor',
        '6th Floor',
        '7th Floor',
        '8th Floor',
        '9th Floor',
        '10th Floor'
    ];

    public function bedType(): BelongsTo
    {
        return $this->belongsTo(BedType::class, 'bed_type_id');
    }
}
