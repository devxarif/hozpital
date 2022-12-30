<?php

namespace App\Models;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holiday extends Model
{
    use HasFactory, BelongsToThrough;

    protected $fillable = [
        'organization_id',
        'title',
        'start',
        'end',
        'color',
        'days'
    ];

    public function user()
    {
        return $this->belongsToThrough(User::class, Organization::class);
    }
}
