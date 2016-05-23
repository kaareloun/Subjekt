<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_type extends Model
{
    protected $primaryKey = 'address_type';
    protected $table = 'address_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name'
    ];
}
