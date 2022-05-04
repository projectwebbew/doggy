<?php

namespace App\Models;

use App\Filters\QueryFilter;
use App\Filters\Sortable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $sortables = ['id', 'name', 'created_at'];


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');   //Вепнет все роли пользователя
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)  //scopeFilter  //Builder-помогает построить цепочку запросов что бы отправить в базу , а возвращает результат с базы
    {
        //$filters  обьект в котором есть параметр request->query->parametrs->array [то что мы отправляем get запросом]

        return $filters->apply($builder);

    }

    public function isAdmin()
    {
        //Получаем все роли пользователя и перебераем
        foreach ($this->roles()->get() as $role) {
            if ($role->slug == 'admin') {
                return true;
            }
        }

        return false;
    }


}
