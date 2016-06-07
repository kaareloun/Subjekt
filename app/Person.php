<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject_type;

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

    public function customer()
    {
        return $this->hasOne('App\Customer', 'subject_fk', 'person')->where('subject_type_fk', '=' , 1);
    }

    public function employee()
    {
        return $this->hasOne('App\Employee', 'person_fk', 'person');
    }

    public function attributes()
    {
        $attributes = array();
        try{
            $subject = $this -> customer() -> firstOrFail() -> subject_type_fk;
            if($subject){
                //App\Subject_type::find(4) -> subject_attribute_type() -> get()
                $attributes[] = Subject_type::find(4) -> subject_attribute_type() -> get() -> toArray();
            }
        } catch(\Exception $e){}


        try{
            $subjectEmployee = $this -> employee() -> firstOrFail() -> person_fk;
            if($subjectEmployee){
                //App\Subject_type::find(4) -> subject_attribute_type() -> get()
                $attributes[] = Subject_type::find(3) -> subject_attribute_type() -> get() -> toArray();
            }
        } catch(\Exception $e){}


        $attributes[] = Subject_type::find(1) -> subject_attribute_type() -> get() -> toArray();
        return $attributes;
    }
    public function subject_attributes()
    {
        return Subject_type::find(4)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->get();
    }

}
