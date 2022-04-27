<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait  Sortable
{
    public function scopeSort(Builder $query, Request $request): Builder
    {
        // Get sortable column
        //Функция data_get by Laravel получает свойства класса , имеется в виду в классе User есть  public $sortables = ['id', 'name', 'created_at']; вот мы и получаем их сюда
        $sortables = data_get($this, 'sortables', []);
        // Теперь в $sortables  то что мы указали в переменной $sortables = ['id', 'name', 'created_at'] в классе User
        // Get the column to sort
        $sort = $request->get('sort');
        $direction = $request->get('direction');
        if ($sort
            && in_array($sort, $sortables)
            && $direction
            && in_array($direction, ['asc', 'desc'])) {
            return $query->orderBy($sort, $direction);
        }
        // No sorting, return query
        return $query;
    }
}
