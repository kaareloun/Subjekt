<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Address;
use Carbon\Carbon;
use App\Http\Requests\personRequest;

use App\Http\Requests;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *
     * SEE PEAKS OLEMA TEGELIKULT CREATES !!!!!!!!
     * pane validator ka eraldi meetodisse
     */
    public function store(personRequest $request)
    {
        //Valideerimine eraldi funktsiooni peaks minema, all samamoodi, tee kood ilusamaks
        /*
        $this->validate($request, [
        'first_name' => 'required|max:12',
        'last_name' => 'required|max:12',
        'birth_date' => 'required|date|after:1900-01-01|before:today',
        'identity_code' => 'required|max:20',

        'country' => 'required|max:50',
        'county' => 'required|max:100',
        'town_village' => 'required|max:100',
        'street_address' => 'required|max:100',
        'zipcode' => 'required|max:50',
        ]);

*/
        $personA = Person::create([ /* v6i return Person::create*/
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'identity_code' => $request['identity_code'],
            'birth_date' => $request['birth_date'],
            'created' => Carbon::now()->toDayDateTimeString(),
        ]);

        $personId = $personA -> person;
        //$personType = $personA ->

        Address::create([ /* v6i return Person::create*/
            'country' => $request['country'],
            'county' => $request['county'],
            'town_village' => $request['town_village'],
            'street_address' => $request['street_address'],
            'zipcode' => $request['zipcode'],
            'subject_fk' => $personId,
            'subject_type_fk' => 1,
            'address_type_fk' => 1,
        ]);

        dd($request->input('first_name'));
    }

    public function storeUpdate(Request $request, $id){
        $this->validate($request, [
            'first_name' => 'required|max:12',
            'last_name' => 'required|max:12',
            'birth_date' => 'required|date|after:1900-01-01|before:today',
            'identity_code' => 'required|max:20',
        ]);


        Person::find($id) -> update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'identity_code' => $request['identity_code'],
            'birth_date' => $request['birth_date'],
            'updated' => Carbon::now()->toDayDateTimeString(),
        ]);


        dd($request->input('first_name'));
    }



    public function showFormGet(){
        return view('person/addPerson');
    }

    public function showFormUpdateGet($id){
        $person = Person::findOrFail($id);
        $addresses = $person -> addresses();
        return view('person/updatePerson', compact('person'), compact('addresses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);
        $addresses = $person -> addresses();
        //dd($addresses);
        return view('person/person', compact('person'), compact('addresses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
