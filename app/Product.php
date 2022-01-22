<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name','qty','price'];

    function order(){
        return $this->hasMany(Order::class);
    }
}

