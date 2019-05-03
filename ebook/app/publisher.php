<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    protected $table = 'publishers';
    protected $fillable = ['name','address','info'];

    public function book(){
    	return $this->hasMany('App\book');
    }
}
