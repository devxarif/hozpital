<?php

namespace App\Models;

use App\Models\User;
use App\Models\Employee;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory, BelongsToThrough;

    protected $fillable = [
        'organization_id',
        'name',
        'slug',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = strSlug($value);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function users()
    {
        return $this->belongsToThrough(User::class, Organization::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'team_id');
    }
}
