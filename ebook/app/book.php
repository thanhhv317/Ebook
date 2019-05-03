<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
 	protected $table = 'books';
    protected $fillable = ['name','alias','publisher_id','kind_id','author_id','price','quantity','description','image'];

    public function publisher(){
    	return $this->belongTo('App\publisher');
    }
    public function author(){
    	return $this->belongTo('App\author');
    }
    public function kind(){
    	return $this->belongTo('App\kind');
    }
    public function bimage(){
    	return $this->hasMany('App\imageBook');
    }
}
