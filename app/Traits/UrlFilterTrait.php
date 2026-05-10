<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait UrlFilterTrait
{
    public function applyFilter($query, $filter)
    {
        $filter = trim($filter);

        if (!$filter || $filter === 'all') {
            return $query;
        }

        switch ($filter) {
            case 'today':
                return $query->whereBetween('created_at', [
                    now()->startOfDay(),
                    now()->endOfDay()
                ]);
            case 'this_week':
                return $query->whereBetween('created_at', [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]);
            case 'this_month':
                return $query->whereBetween('created_at', [
                    now()->startOfMonth(),
                    now()->endOfMonth()
                ]);
            case 'last_month':
                return $query->whereBetween('created_at', [
                    now()->subMonth()->startOfMonth(),
                    now()->subMonth()->endOfMonth()
                ]);
            default:
                return $query;
        }
    }



}
