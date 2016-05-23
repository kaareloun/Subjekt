<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact';
    protected $table = 'contact';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_fk', 'contact_type_fk', 'value_text', 'orderby', 'subject_type_fk', 'note'
    ];
}
