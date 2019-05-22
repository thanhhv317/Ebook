<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['quantity','totalPrice','name','address','phone','email','content','status'];
}
