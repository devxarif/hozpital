<?php

namespace App\Http\Traits;

trait Sluggable
{
    /**
    * The mutator that should be set slug
    *
    * @param string $value
    *
    * @return void
    */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = strSlug($value);
    }
}
