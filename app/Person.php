<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $primaryKey = 'person';
    protected $table = 'person';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'identity_code', 'birth_date', 'created_by', 'updated_by', 'created', 'updated'
    ];
}
