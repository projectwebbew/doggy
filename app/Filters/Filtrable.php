<?php


namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;

trait Filtrable
{
    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
