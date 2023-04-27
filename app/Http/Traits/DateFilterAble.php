<?php

namespace App\Http\Traits;

trait DateFilterAble
{
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', '>', now()->today());
    }

    public function scopeYesterday($query)
    {
        return $query->whereDate('created_at', '>', now()->subDay());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month);
    }

    public function scopeLastMonth($query)
    {
        return $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
    }

    public function scopeLast6Month($query)
    {
        return $query->whereBetween('created_at', [now()->subMonth(6), now()]);
    }

    public function scopeThisYear($query)
    {
        return $query->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()]);
    }

    public function scopeLastYear($query)
    {
        return $query->whereDate('created_at', '>', now()->subYear());
    }

    public function scopeCustomDate($query, $date)
    {
        return $query->whereDate('created_at', $date);
    }

    public function scopeCustomRangeDate($query, $start_date, $end_date)
    {
        return $query->whereDate('created_at', '>=', $start_date)
        ->whereDate('created_at', '<=', $end_date);
    }
}
