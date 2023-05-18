<?php

namespace App\Http\Traits;

trait HasImageAppend
{
    /**
     * The accessors that should be return image full path
     *
     * @param  string  $image
     * @return array
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : asset('backend/image/default.png');
    }
}
