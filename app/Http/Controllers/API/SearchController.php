<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject_type;
use App\Person;
use App\Enterprise;
use App\Employee;
use App\Customer;

class SearchController extends Controller
{
    public function index()
    {
        $subjectTypes = Subject_type::all();
        return view('person/search', compact('subjectTypes'));
    }

    public function search(Request $request)
    {
        $searchFields = [];
        switch ($request['subjekt']) {
            //isik
            case "1":
                if($request['eesnimi']) {
                    $searchFields[] = ['first_name', 'ilike', '%' . $request['eesnimi'] . '%'];
                }
                if($request['nimi']) {
                    $searchFields[] = ['last_name', 'ilike', '%' . $request['nimi'] . '%'];
                }
                $result = Person::where($searchFields)->get();
                break;
            //ettevõte
            case "2":
                if($request['nimi']) {
                    $searchFields[] = ['full_name', 'ilike', '%' . $request['nimi'] . '%'];
                }
                $result = Enterprise::where($searchFields)->get();
                break;
            //töötaja
            case "3":
                if($request['eesnimi']) {
                    $searchFields[] = ['first_name', 'ilike', '%' . $request['eesnimi'] . '%'];
                }
                if($request['nimi']) {
                    $searchFields[] = ['last_name', 'ilike', '%' . $request['nimi'] . '%'];
                }

                $persons = Person::where($searchFields)->get();
                $result = array();
                if(count($persons) > 0) {
                    foreach ($persons as $person) {
                        $employee = Employee::where('person_fk', '=', $person->person);
                        if(count($employee->get()) > 0) {
                            $result[] = $employee
                            ->join('enterprise', 'enterprise_fk', '=', 'enterprise')
                            ->join('person', 'person_fk', '=', 'person')
                            ->get();
                        }
                    }
                }
                break;
            //klient
            case "4":
                if($request['nimi']) {
                    $searchFields[] = ['last_name', 'ilike', '%' . $request['nimi'] . '%'];
                }
                if($request['eesnimi']) {
                    $searchFields[] = ['first_name', 'ilike', '%' . $request['eesnimi'] . '%'];
                }
                if($request['eesnimi']) {
                    //otsitakse personit
                    $result = array();
                    $persons = Person::where($searchFields)->get();
                    if(count($persons) > 0) {
                        foreach ($persons as $person) {
                            $customer = Customer::where('subject_type_fk', '=', 1);
                            if(count($customer->get()) > 0) {
                                $result[] = $customer
                                    ->where('subject_fk', '=', $person->person)
                                    ->join('person', 'subject_fk', '=', 'person')
                                    ->get();
                            }
                        }
                    }
                } else if($request['nimi']) {
                    //otsitakse personit JA enterprise
                    $result = array();

                    $persons = Person::where($searchFields)->get();
                    if(count($persons) > 0) {
                        foreach ($persons as $person) {
                            $customer = Customer::where('subject_type_fk', '=' , 1)->where('subject_fk', '=', $person->person);
                            if(count($customer->get()) > 0) {
                                $result[] = $customer
                                    ->where('subject_fk', '=', $person->person)
                                    ->join('person', 'subject_fk', '=', 'person')
                                    ->get();
                            }
                        }
                    }
                    $enterprises = Enterprise::where('full_name', 'ilike', '%' . $request['nimi'] . '%')->get();
                    if(count($enterprises) > 0) {
                        foreach ($enterprises as $enterprise) {
                            $customer = Customer::where('subject_type_fk', '=' , 2)->where('subject_fk', '=', $enterprise->enterprise);
                            if(count($customer->get()) > 0) {
                                $result[] = $customer
                                    ->where('subject_fk', '=', $enterprise->enterprise)
                                    ->join('enterprise', 'subject_fk', '=', 'enterprise')
                                    ->get();
                            }
                        }
                    }
                }
                break;
        }
        return redirect()->back()->with('result', $result)->with('type', $request['subjekt']);
    }

    public function attributes(Request $request)
    {
        return Subject_type::find($request['subjectType'])->subject_attribute_type()->get();
    }
}
