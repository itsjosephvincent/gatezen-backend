<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KlarnaRequest extends FormRequest
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
            'success_url' => 'required',
            'cancel_url' => 'required',
            'terms_url' => 'required',
            'country' => 'required'
        ];
    }
}
