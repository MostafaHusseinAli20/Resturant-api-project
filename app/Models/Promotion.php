<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $fillable = ['employee_id', 'department_id', 'salary_increase_percentage'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_id', 'id');
    }
}
