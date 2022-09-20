<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'notif_email'=> 'boolean',
            'notif_mobile	' => 'boolean',
            'notif_sms'   => 'boolean',
            'notif_phone'         => 'boolean',
            'id_user'         => 'numeric'
        ];
    }
}
