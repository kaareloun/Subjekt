<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EnterpriseRequest extends Request
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
            'name' => 'required|max:10',
            'full_name' => 'required|max:20',

            /*'country' => 'required|max:50',
            'county' => 'required|max:100',
            'town_village' => 'required|max:100',
            'street_address' => 'required|max:100',
            'zipcode' => 'required|max:50',*/
        ];
    }
}
