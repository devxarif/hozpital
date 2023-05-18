<?php

namespace App\Models;

use App\Http\Traits\HasImageAppend;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory, HasImageAppend;

    protected $fillable = ['image'];

    protected $appends = ['image_url'];
}
