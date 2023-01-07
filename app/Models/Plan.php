<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'price',
        'interval',
        'status',
        'default',
    ];

    public function planFeatures()
    {
        return $this->hasOne(PlanFeature::class, 'plan_id');
    }
}
