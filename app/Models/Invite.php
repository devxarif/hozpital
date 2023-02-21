<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
