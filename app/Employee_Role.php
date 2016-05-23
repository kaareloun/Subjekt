<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_Role extends Model
{
    protected $primaryKey = 'employee_role';
    protected $table = 'employee_role';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_fk', 'employe_role_type_fk', 'active'
    ];
}
