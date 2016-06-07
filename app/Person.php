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
        $subject_attributes = array();
        try{
            $subject = $this -> customer() -> firstOrFail() -> customer;
            if($subject){
                //App\Subject_type::find(4) -> subject_attribute_type() -> get()
                $subject_attributes[] = Subject_type::find(4)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->where('subject_fk', '=' , $subject)->get();
            }
        }catch(\Exception $e){}
        

        try{
            $subjectEmployee = $this -> employee() -> firstOrFail() -> person_fk;
            if($subjectEmployee){
                //App\Subject_type::find(4) -> subject_attribute_type() -> get()
                $subject_attributes[] = Subject_type::find(3)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->where('subject_fk', '=' , $subjectEmployee)->get();
            }
        } catch(\Exception $e){}
        
        
        $subject_attributes[] = Subject_type::find(1)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->where('subject_fk', '=' , $this -> person)->get();

        
        return $subject_attributes;
        //return Subject_type::find(4)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->get();
    }
    
    public function subject_attributesCollection()
    {
        $subject_attributes = array();
        $subject_attributesCollection = new \Illuminate\Database\Eloquent\Collection;
        try{
            $subject = $this -> customer() -> firstOrFail() -> customer;
            if($subject){
                //App\Subject_type::find(4) -> subject_attribute_type() -> get()
                $subject_attributes1 = Subject_type::find(4)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->where('subject_fk', '=' , $subject)->get();
                foreach($subject_attributes1 as $subject_attribute1){
                    $subject_attributesCollection -> add($subject_attribute1);
                }
            }
        }catch(\Exception $e){}
        

        try{
            $subjectEmployee = $this -> employee() -> firstOrFail() -> person_fk;
            if($subjectEmployee){
                //App\Subject_type::find(4) -> subject_attribute_type() -> get()
                $subject_attributes2 = Subject_type::find(3)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->where('subject_fk', '=' , $subjectEmployee)->get();
                foreach($subject_attributes2 as $subject_attribute2){
                    $subject_attributesCollection -> add($subject_attribute2);
                }           
            }
        } catch(\Exception $e){}
        
        
        $subject_attributes3 = Subject_type::find(1)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->where('subject_fk', '=' , $this -> person)->get();
                foreach($subject_attributes3 as $subject_attribute3){
                    $subject_attributesCollection -> add($subject_attribute3);
                }
        
        return $subject_attributesCollection;
        //return Subject_type::find(4)->subject_attribute_type()->join('subject_attribute', 'subject_attribute_type.subject_attribute_type', '=', 'subject_attribute.subject_attribute_type_fk')->get();
    }
    

}
