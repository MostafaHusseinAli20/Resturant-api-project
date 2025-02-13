<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = ['table_number', 'seating_capacity', 'location'];
}
