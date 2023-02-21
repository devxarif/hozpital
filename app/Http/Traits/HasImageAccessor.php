<?php

namespace App\Http\Traits;

trait HasImageAccessor
{
    /**
     * The accessors that should be return image full path
     *
     * @param  string  $image
     * @return array
     */
    public function getImageAttribute($image)
    {
        return $image ? asset($image) : asset('admin/img/default.png');
    }
}
