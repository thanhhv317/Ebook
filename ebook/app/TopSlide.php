<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopSlide extends Model
{
    protected $table = 'top_slides';
    protected $fillable = ['id','value'];

}
