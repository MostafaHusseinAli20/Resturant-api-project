<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = ['order_id', 'amount', 'payment_status', 'payment_method'];

    public function orders(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
