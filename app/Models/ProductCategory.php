<?php

namespace App\Models;

use App\Http\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, Sluggable;

    /**
    * The accessors that should be return image full path
    *
    * @param string $image
    *
    * @return array
    */
    public function getImageAttribute($image)
    {
        return $image ? asset($image) : asset('admin/img/default.png');
    }
}
