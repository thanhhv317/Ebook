<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
	protected $table = 'authors';
    protected $fillable = ['name','alias','birthday','info','image'];

    public function book(){
    	return $this->hasMany('App\book');
    }

}
