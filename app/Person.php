<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $primaryKey = 'person';
    protected $table = 'person';
    /*
    https://laravel.com/docs/5.2/eloquent#timestamps
    */
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'identity_code', 'birth_date', 'created_by', 'updated_by', 'created', 'updated'
    ];

    public function addresses()
    {
        return $this->hasMany('App\Address', 'subject_fk')->where('subject_type_fk', '=' , 1);
    }

    public function enterprises()
    {
        return $this->belongsToMany('App\Enterprise', 'enterprise_person_relation', 'person_fk', 'enterprise_fk');
    }
}
