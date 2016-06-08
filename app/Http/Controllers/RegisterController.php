<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;
use App\User_account;
use App\Person;

class RegisterController extends Controller
{
    //
    
    
    public function showForm($id){
        //dd($id);
        //return view('person/updatePerson', compact('person'), compact('addresses'));
        $employee = Employee::find($id);
        $userExists = false;
        $person = Person::find($employee -> person_fk) -> person;
        //dd($person);
        
        
        
        
        
        if(User_account::where('subject_fk','=', $employee -> employee) -> first()){
            $userExists = true;
        }
        
        
        
        return view('person/addUser', compact('employee'), compact('userExists','person'));
    }
    
    public function createUser(Request $request){
        
        $employee = Employee::find($request['subject_fk']);

        //dd("/person/" . $employee -> person_fk);
        
        $password = bcrypt($request['password']);
        
        User_account::create([
            'subject_type_fk' => '3',
            'subject_fk' => $employee -> employee,
            'username' => $request['username'],
            'passw' => $password,
            'status' => '1',        
        ]);
        
        return redirect("/person/" . $employee -> person_fk);
    }
    
}
