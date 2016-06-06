<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnterpriseRequest;
use Illuminate\Http\Request;
use App\Enterprise;
use App\Ent_Per_Relation_Type as Relation;

use App\Http\Requests;

class EnterpriseController extends Controller
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
        return view('enterprise/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnterpriseRequest $request)
    {
        Enterprise::create([
            'name' => $request->input('name'),
            'full_name' => $request->input('full_name'),
            'updated' => '2015-01-01'
        ]);

        Address::create([
            'country' => $request['country'],
            'county' => $request['county'],
            'town_village' => $request['town_village'],
            'street_address' => $request['street_address'],
            'zipcode' => $request['zipcode'],
            'subject_fk' => $enterprise->enterprise,
            'subject_type_fk' => 2,
            'address_type_fk' => 3,
        ]);

        return redirect('enterprise/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enterprise = Enterprise::findOrFail($id);

        return view('enterprise/show', compact('enterprise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enterprise = Enterprise::findOrFail($id);
        $relations = Relation::all();

        return view('enterprise/edit', compact('enterprise', 'relations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnterpriseRequest $request, $id)
    {
        $enterprise = Enterprise::find($id)->update([
            'name' => $request->input('name'),
            'full_name' => $request->input('full_name')
        ]);

        return redirect('enterprise/' . $id . '/edit')->with($enterprise);
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
