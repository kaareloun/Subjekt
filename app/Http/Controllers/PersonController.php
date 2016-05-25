<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Carbon\Carbon;

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
    public function store(Request $request)
    {
        $this->validate($request, [
        'first_name' => 'required|max:12',
        'last_name' => 'required|max:12',
        'birth_date' => 'required|date|after:1900-01-01|before:today',
        'identity_code' => 'required|max:20',
        ]);

        Person::create([ /* v6i return Person::create*/
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'identity_code' => $request['identity_code'],
            'birth_date' => $request['birth_date'],
            'created' => Carbon::now()->toDayDateTimeString(),
        ]);


        dd($request->input('first_name'));
    }

    public function showFormGet(){
        return view('person/addPerson');
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
        return view('person/person', compact('person'));
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
