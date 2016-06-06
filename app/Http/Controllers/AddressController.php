<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Address;
use App\Address_type;
use Validator;

class AddressController extends Controller
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
    public function create(Request $request)
    {

        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'country' => 'required|max:50',
            'county' => 'required|max:100',
            'town_village' => 'required|max:100',
            'street_address' => 'required|max:100',
            'zipcode' => 'required|max:50',
        ]);
        
        $newAddress = Address::create([ /* v6i return Person::create*/
            'country' => $request['country'],
            'county' => $request['county'],
            'town_village' => $request['town_village'],
            'street_address' => $request['street_address'],
            'zipcode' => $request['zipcode'],
            'subject_fk' => $request['subject_fk'],
            'subject_type_fk' => $request['subject_type_fk'], // NB SIIN TULEB PARANDUS TEHA VIEWS!!!
            'address_type_fk' => 2,
        ]);
        return response()->json($newAddress);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [
            'country' => 'required|max:50',
            'county' => 'required|max:100',
            'town_village' => 'required|max:100',
            'street_address' => 'required|max:100',
            'zipcode' => 'required|max:50',
        ]);
        
        $subjectId = Address::find($id) -> subject_fk;
        $subjectAddresses = Address::where('subject_fk',$subjectId)->get();
        
        if($request['address_type'] == true){
            foreach ($subjectAddresses as $subjectAddress) {
                if($subjectAddress -> address != $id){
                    $subjectAddress->update([
                        'address_type_fk' => 2,
                    ]);
                }
            }   
        }

        

        if(Address::find($id)-> address_type_fk == 2){
            if ($request['address_type'] == true){
                $address = Address::find($id)->update([
                    'address_type_fk' => 1,
                ]);
            } else if(Address::find($id) -> subject_type_fk = 2 && $request['address_type'] == true){
                $address = Address::find($id)->update([
                    'address_type_fk' => 3,
                ]);
            } else{
                $address = Address::find($id)->update([
                    'address_type_fk' => 2,
                ]);
            }
        }

        
        $address = Address::find($id)->update([
            'country' => $request['country'],
            'county' => $request['county'],
            'town_village' => $request['town_village'],
            'street_address' => $request['street_address'],
            'zipcode' => $request['zipcode'],
        ]);
        
        $AddressUpdated = Address::find($id);

        
        return response()->json(Address::with('Address_type') -> find($id));
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
