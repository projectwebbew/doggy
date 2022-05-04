<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class Reviews extends Model
{
    protected $fillable = ['user_id','dog_id','review'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
