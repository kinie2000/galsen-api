<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
           'vehicle_number_place'=> 'numeric',
            'vehicle_mileage'=> 'numeric',
            'vehicle_country_registration'=> 'string',
            'vehicle_date_release'=> 'date',
            'vehicle_date_next_control'=> 'date',
            'vehicle_registration'=> 'string',
            'vehicle_adress'=> 'string',
            'vehicle_price_location'=> 'numeric',
            'vehicle_description'=> 'string',
            'vehicle_number_insurance'=> 'numeric',
            'vehicle_date_start_insurance'=> 'date',
            'vehicle_date_end_insurance'=> 'date',
            'prop_id'=> 'numeric',
            'mark_id'=> 'numeric',
            'insurance_id'=> 'numeric',
            'title_image'=> 'string',
            'vehicle_id '=>'numeric',
            'caracteristique_principale'=> 'string',
             'ESP'=> 'boolean',
            'Radio'=> 'boolean',
            'AirBag'=> 'boolean',
            'ABS'=> 'boolean',
             'Direction_assiste'=> 'boolean',
            'sieg_enfant'=> 'boolean',
            'GPS'=> 'boolean',
            'coffre_de_toi'=> 'boolean',
            'pneu_neige'=> 'boolean',
        ];
    }
}
