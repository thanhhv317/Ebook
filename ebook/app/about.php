<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $table = 'abouts';
    protected $fillable = ['banner','image','story','description','slogant','author'];
}
