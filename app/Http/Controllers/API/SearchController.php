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
        switch ($request['subjekt']) {
            case 1: //isik
                $searchFields = [];
                if($request['eesnimi']) {
                    $searchFields[] = ['first_name', 'ilike', '%' . $request['eesnimi'] . '%'];
                }
                if($request['nimi']) {
                    $searchFields[] = ['last_name', 'ilike', '%' . $request['nimi'] . '%'];
                }
                $result = Person::where($searchFields)->get();
            /*//ettevõte
            case 2:
                echo "Your favorite color is blue!";
                break;
            //töötaja
            case 3:
                echo "Your favorite color is green!";
                break;
            //klient
            case 4:
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";*/
        }
        return redirect()->back()->with('result', $result);
    }

    public function attributes(Request $request)
    {
        return Subject_type::find($request['subjectType'])->subject_attribute_type()->get();
    }
}
