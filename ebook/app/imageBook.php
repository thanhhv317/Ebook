<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imageBook extends Model
{
    protected $table = 'image_books';
    protected $fillable = ['id','book_id','image'];

    public function book(){
    	return $this->belongTo('App\book');
    }
}
