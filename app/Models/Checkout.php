<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkout';
    function product(){
        return $this->hasMany('App\Models\Product');
    }
    function user(){
        return $this->hasMany('App\Models\User');
    }
}
