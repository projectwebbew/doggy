<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait  Sortable
{

    public function scopeSort (Builder $query, Request $request)
    {
        $sortables = data_get ($this, 'sortables', []);
        $sort = $request->get ('category_id_female');
    }

}
