<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopBanner extends Model
{
    protected $table = 'top_banners';
    protected $fillable = ['id','value'];
}
