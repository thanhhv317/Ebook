<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderPage extends Model
{
    protected $table = 'headerPages';
    protected $fillable = ['id','image', 'text','title'];
}
