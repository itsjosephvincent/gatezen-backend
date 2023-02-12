<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
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
        if (isset($this->verification_code)) {
            return [
                'email' => 'required|email',
                'password' => 'required',
                'verification_code' => 'required',
            ];
        }
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
