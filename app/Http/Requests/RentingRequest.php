<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentingRequest extends FormRequest
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
            //
             'renting_date_departure'=> 'required|date',
            'renting_date_return' => 'required|date',
            'loc_id'   => 'required|numeric',
            'vehicle_id'         => 'required|numeric'
        ];
    }
}
