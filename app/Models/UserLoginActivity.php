<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'device',
        'platform',
        'browser',
        'ip_address',
        'user_id',
        'user_email',
        'user_activity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
