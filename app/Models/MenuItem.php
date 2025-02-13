<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $fillable = ['name', 'description', 'price', 'category_id', 'preparation_time', 'available'];
    
    public function images(){
        return $this->hasMany(MenuItemImage::class, 'menu_item_id', 'id');
    }
}
