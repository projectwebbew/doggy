<?php


namespace App\Filters;


class DogFilter extends QueryFilter
{
    public function gender($val)
    {
       $this->builder->wherein('gender',$val);

    }

}
