<?php

namespace App\Models;

use App\Http\Traits\HasImageAppend;
use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory, HasImageAppend;

    protected $fillable = [
        'title',
        'name',
        'image',
        'description',
    ];

    protected $appends = ['image_url'];

}
