<?php

namespace App\Models;

use App\Http\Traits\Sluggable;
use App\Http\Traits\HasImageAccessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sluggable, HasImageAccessor;

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
