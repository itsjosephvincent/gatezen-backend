<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerUpdateRequest extends FormRequest
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
        $userId = $this->route()->parameters()['customer'];

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('customers')->ignore($userId)],
            'mobile' => 'required'
        ];
    }
}
