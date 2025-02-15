<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    //
    protected $fillable = ['customer_id', 'table_id', 'status', 'number_of_people', 'reservations_date'];
}
