<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_role_type extends Model
{
    protected $primaryKey = 'employee_role_type';
    protected $table = 'employee_role_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name'
    ];
}
