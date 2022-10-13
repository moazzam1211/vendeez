<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    function categories(){
        return $this->belongsTo('App\Models\Categories');
    }
    function cart(){
        return $this->hasMany('App\Models\Cart');
    }
    function checkout(){
        return $this->belongsTo('App\Models\Checkout');
    }
}
