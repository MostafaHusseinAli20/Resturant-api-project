<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItemImage extends Model
{
    //
    protected $fillable = ['image_path', 'menu_item_id'];
    
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id', 'id');
    }
}
