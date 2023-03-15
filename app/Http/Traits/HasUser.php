<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasUser
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The accessors that should be return avatar full path
     *
     * @param  string  $avatar
     * @return array
     */
    public function getAvatarAttribute($avatar)
    {
        return $avatar ? asset($avatar) : asset('assets/img/default-user.png');
    }
}
