<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;



    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}
