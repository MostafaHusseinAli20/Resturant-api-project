<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $fillable = ['customer_id', 'order_id', 'rate', 'comments'];
}
