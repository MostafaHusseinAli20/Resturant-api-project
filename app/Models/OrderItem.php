<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'menu_item_id', 'quantity', 'price', 'notes'];

    public function orders(){
        return $this->hasMany(Order::class, 'order_id','id');
    }

    public function menuItems(){
        return $this->hasMany(MenuItem::class, 'menu_item_id','id');
    }
}
