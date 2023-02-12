<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPayoutUpdateRequest extends FormRequest
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
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'bank_swift_code' => 'required'
        ];
    }
}
