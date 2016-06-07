<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer';
    protected $table = 'customer';
    
    public $timestamps  = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_fk', 'subject_type_fk'
    ];
}
