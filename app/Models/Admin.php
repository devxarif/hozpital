<?php

namespace App\Models;

use App\Http\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory, HasUser;

    protected $guarded = [];

}
