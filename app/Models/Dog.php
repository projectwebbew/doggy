<?php

namespace App\Models;

 use App\Filters\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Dog extends Model
{
    use  Sortable ,HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'months', 'price', 'image', 'gallery', 'weight', 'gender'];


    public $sortables = ['gender'];


}
