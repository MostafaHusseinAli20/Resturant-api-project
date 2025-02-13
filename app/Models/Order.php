<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'status', 'total_amount', 'delivery_address', 'special_instructions'];
    public function customers(){
        return $this->hasMany(Customer::class, 'customer_id','id');
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
}
