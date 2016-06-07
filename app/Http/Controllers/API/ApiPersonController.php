<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Person;
use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Employee;

class ApiPersonController extends Controller
{
    public function show(Request $request)
    {
        return Person::where('first_name', 'ilike', '%' . $request['first_name'] . '%')->firstOrFail();
    }

    public function link(Request $request)
    {
        $enterprise = Enterprise::find($request['enterprise']);
        $person = Person::find($request['person']);

        $enterprise->persons()->attach($person->person, ['ent_per_relation_type_fk' => $request['relation']]);
        Employee::create([
            'person_fk' => $person->person,
            'enterprise_fk' => $enterprise->enterprise,
            'active' => 'Y'
        ]);

        return redirect('/enterprise/' . $request['enterprise'] . '/edit');
    }
}
