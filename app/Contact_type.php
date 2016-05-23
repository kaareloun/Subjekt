<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_type extends Model
{
    protected $primaryKey = 'contact_type';
    protected $table = 'contact_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name'
    ];
}
