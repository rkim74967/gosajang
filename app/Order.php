<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['product_name','customer_name','address','phone','qty','eta','created_by'];

    function product(){
        return $this->belongsTo(Product::class);
    }

    function status(){
        return $this->belongsTo(Status::class);
    }

    function sales(){
        return $this->hasOne(Sales::class);
    }
}
