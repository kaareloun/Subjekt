<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_type extends Model
{
    protected $primaryKey = 'subject_type';
    protected $table = 'subject_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name'
    ];
}
