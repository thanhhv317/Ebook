<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table = 'bills';
    protected $fillable = ['customer_id','employee_id','sum_price'];
}
