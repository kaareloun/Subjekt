<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;

class RegisterController extends Controller
{
    //
    
    
    public function showForm($id){
        //dd($id);
        //return view('person/updatePerson', compact('person'), compact('addresses'));
        $employee = Employee::find($id);
        return view('person/addUser', compact('employee'));
    }
    
}
