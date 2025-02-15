<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['order_id', 'amount', 'payment_status', 'payment_method'];

    public function orders(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
