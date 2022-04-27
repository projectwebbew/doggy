<?php

namespace App\Models;

 use App\Filters\Filtrable;
 use App\Filters\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Dog extends Model
{
    use  Sortable ,HasFactory, Filtrable;

    //Для метода filter необходим
    //1 Filtrable
    //2 QueryFilter
    //3 Dog Filter (наследует queryfilter);
    public $timestamps = false;
    protected $fillable = ['name', 'months', 'price', 'image', 'gallery', 'weight', 'gender'];


    public $sortables = ['gender'];


}
