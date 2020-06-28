<?php

namespace App\Helper;

trait SearchPaginate {
    public function scopeSearchAndPaginate($query) {
        $request = app()->make('request');

        return $query->where(function($query) use ($request) {
            if ($request->has('search')) {
                collect(self::$search_columns)->map(function($column) use ($query, $request) {
                    return $query->orWhere($column, 'LIKE', $request->search);
                });
            }

            // Busqueda por fecha
            if ($request->has('searchDate')) {
                if ($request->searchDate != null) {
                    collect(self::$search_columns)->map(function($column) use ($query, $request) {
                        return $query->whereDate($column, 'LIKE', $request->searchDate);
                    });
                }
            }
        })->paginate(20);
    }
}