<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    use HasFactory;

    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_PENDING = 'pending';

    protected $fillable = [
        'organization_id',
        'team_id',
        'email',
        'token',
        'status',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
