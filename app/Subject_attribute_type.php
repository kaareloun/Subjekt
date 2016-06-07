<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_attribute_type extends Model
{
    protected $primaryKey = 'subject_attribute_type';
    protected $table = 'subject_attribute_type';
    
    public $timestamps  = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_type_fk', 'type_name', 'data_type', 'orderby', 'required', 'multiple_attributes', 'created_by_default'
    ];
}
