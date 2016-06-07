<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_attribute extends Model
{
    protected $primaryKey = 'subject_attribute';
    protected $table = 'subject_attribute';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_fk', 'subject_attribute_type_fk', 'subject_type_fk', 'orderby', 'value_text', 'value_number', 'value_date', 'data_type'
    ];
}
