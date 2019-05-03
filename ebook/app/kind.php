<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kind extends Model
{
    protected $table = 'kinds';
    protected $fillable = ['id','name'];

    public function book(){
    	return $this->hasMany('App\book');
    }
}
