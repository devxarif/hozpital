<?php

namespace App\Models;

use App\Http\Traits\Sluggable;
use App\Http\Traits\HasImageAppend;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, Sluggable, HasImageAppend;

    protected $guarded = [];

    protected $appends = ['image_url'];
}
