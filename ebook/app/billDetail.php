<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billDetail extends Model
{
    protected $table = 'bill_details';
    protected $fillable = ['bill_id','book_id','unit_price','quantity','sum_price'];
}
