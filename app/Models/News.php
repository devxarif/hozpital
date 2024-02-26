<?php

namespace App\Models;

use App\Models\NewsCategory;
use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use RyanChandler\Comments\Concerns\HasComments;

class News extends Model
{
    use HasFactory, Sluggable, HasComments;

    protected $fillable = [
        'news_category_id',
        'name',
        'image',
        'short_description',
        'long_description',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }
}
