<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Struct_unit extends Model
{
    protected $primaryKey = 'struct_unit';
    protected $table = 'struct_unit';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enterprise_fk', 'upper_unit_fk', 'level', 'name'
    ];
}
