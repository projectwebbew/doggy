<?php


namespace App\Filters;


class UserFilter extends QueryFilter
{
    public function role($val)
    {
        //Валидируем коректность типа вводимого значения
        //которое должно быть цифрой
        if (is_numeric($val)) {
            return $this->builder->whereHas('roles', function ($q) use ($val) {
                $q->where('id', $val);
            });
        }

    }

    public function name($val)
    {

        return $this->builder->where('name', 'like', '%' . $val . '%')
            ->orWhere('email', 'like', '%' . $val . '%');
    }
}
