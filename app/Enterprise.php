<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $primaryKey = 'enterprise';
    protected $table = 'enterprise';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'full_name', 'created_by', 'updated_by', 'created', 'updated'
    ];

    public function addresses()
    {
        return $this->hasMany('App\Address', 'subject_fk')->where('subject_type_fk', '=' , 2);
    }

    public function persons()
    {
        return $this->belongsToMany('App\Person', 'enterprise_person_relation', 'enterprise_fk', 'person_fk')->withPivot('ent_per_relation_type_fk');
    }
}
