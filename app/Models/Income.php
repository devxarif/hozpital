<?php

namespace App\Models;

use App\Models\IncomeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;

    public function incomeCategory()
    {
        return $this->belongsTo(IncomeCategory::class);
    }

    public function getDateAttribute($date)
    {
        if ($date) {
            return formatTime($date, 'd M Y');
        }

        return null;
    }
}
