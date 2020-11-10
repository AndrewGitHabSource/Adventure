<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlight extends FormRequest
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
            'from' => 'required',
            'where' => 'required',
            'description' => 'required',
            'price' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'travelers' => 'required',
        ];
    }
}
