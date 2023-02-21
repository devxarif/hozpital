<?php

namespace App\Models;

use App\Http\Traits\HasImageAccessor;
use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory, Sluggable, HasImageAccessor;

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
