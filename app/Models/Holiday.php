<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class Holiday extends Model
{
    use HasFactory, BelongsToThrough;

    protected $fillable = [
        'organization_id',
        'title',
        'start',
        'end',
        'color',
        'days',
    ];

    public function user()
    {
        return $this->belongsToThrough(User::class, Organization::class);
    }
}
