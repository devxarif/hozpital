<?php

namespace App\Models;

use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'news_category_id',
        'name',
        'image',
        'short_description',
        'long_description',
    ];
}
