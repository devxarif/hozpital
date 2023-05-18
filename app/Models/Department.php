<?php

namespace App\Models;

use App\Http\Traits\Sluggable;
use App\Http\Traits\HasImageAppend;
use App\Http\Traits\HasImageAccessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory, Sluggable, HasImageAccessor, HasImageAppend;

    protected $guarded = [];
    protected $appends = ['image_url'];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }


}
