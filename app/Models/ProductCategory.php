<?php

namespace App\Models;

use App\Http\Traits\HasImageAccessor;
use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory, Sluggable, HasImageAccessor;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
