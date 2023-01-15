<?php

namespace App\Models;

use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BedFloor extends Model
{
    use HasFactory, Sluggable;

    public function beds(): HasMany
    {
        return $this->hasMany(Bed::class);
    }
}
