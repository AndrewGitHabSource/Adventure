<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAvailability extends FormRequest
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
            'email' => 'required|unique:availability_hotels,email|email:rfc',
            'name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'guest_count' => 'required',
            'children_count' => 'required'
        ];
    }
}
