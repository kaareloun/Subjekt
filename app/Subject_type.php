<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_type extends Model
{
    protected $primaryKey = 'subject_type';
    protected $table = 'subject_type';
    
    public $timestamps  = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name'
    ];
    
    public function subject_attribute_type()
    {
        return $this->hasMany('App\Subject_attribute_type', 'subject_type_fk', 'subject_type');
    }
}
