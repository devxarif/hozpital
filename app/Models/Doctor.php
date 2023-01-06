<?php

namespace App\Models;

use App\Http\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory, HasUser;

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
