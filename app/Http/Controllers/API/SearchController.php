<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject_type;
use App\Person;

class SearchController extends Controller
{
    public function index()
    {
        $subjectTypes = Subject_type::all();
        return view('person/search', compact('subjectTypes'));
    }

    public function search(Request $request)
    {
        if($request['eesnimi']) {
            $result = Person::where('first_name', 'ilike', '%' . $request['eesnimi'] . '%')->firstOrFail();
            //TODO: REDIRECT ERROR
            return redirect('/search')->with($result);
        }
    }

    public function attributes(Request $request)
    {
        return Subject_type::find($request['subjectType'])->subject_attribute_type()->get();
    }
}
