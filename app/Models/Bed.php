<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bed extends Model
{
    use HasFactory;

    public function bedType(): BelongsTo
    {
        return $this->belongsTo(BedType::class, );
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(BedFloor::class, 'bed_floor_id');
    }
}
