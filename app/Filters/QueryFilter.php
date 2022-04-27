<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    protected $builder;
    protected $request;

    public function __construct(Request $request) //Вызываем конструкт для того что наш request был доступен во всех методах класса
    {
        $this->request = $request;
    }

    public function filters()
    {
        return $this->request->query();
    }


    public function apply(Builder $builder)
    {
        $this->builder = $builder;//$builder Строит запросы

        foreach ($this->filters() as $name => $value) {
            // method_exists -Проверяет есть  ли метод name класса в обьекте $this
            //call_user_func_array-Вызывает callback-функцию с массивом параметров
            //array_filter-
            // isset определяет, объявлена ли переменная и отличается от null
            if (isset($value) && !empty($value)) {
                if (method_exists($this, $name)) {
                    call_user_func_array([$this, $name], array_filter([$value]));
                    // аналогично вызову нашего класса ($this) c методом ($name) и передав туда параметр  $value
                }
            }
        }

        return $this->builder;
    }


}
