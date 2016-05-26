<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class personRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:12',
            'last_name' => 'required|max:12',
            'birth_date' => 'required|date|after:1900-01-01|before:today',
            'identity_code' => 'required|max:20',
            
            'country' => 'required|max:50',
            'county' => 'required|max:100',
            'town_village' => 'required|max:100',
            'street_address' => 'required|max:100',
            'zipcode' => 'required|max:50',
        ];
    }
}
