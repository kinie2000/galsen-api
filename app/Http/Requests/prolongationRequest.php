<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class prolongationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
             'prolongation_date_start'=> 'required|date',
            'prolongation_date_end' => 'required|date',
            'renting_id'   => 'required|numeric',
        ];
    }
}
