<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'address';
    protected $table = 'address';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_type_fk', 'subject_fk', 'subject_type_fk', 'country', 'county', 'town_village', 'street_address', 'zipcode'
    ];
}
