<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    function product(){
        return $this->belongsTo('App\Models\Product');
    }
    function user(){
        return $this->hasMany('App\Models\User');
    }
}
