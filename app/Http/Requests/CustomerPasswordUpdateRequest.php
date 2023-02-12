<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CustomerPasswordUpdateRequest extends FormRequest
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
        $userId = auth()->user()->id;

        if (isset($this->current_password)) {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'display_name' => 'required',
                'email' => ['required', 'email', Rule::unique('customers')->ignore($userId)],
                'current_password' => 'required',
                'password' => ['required', 'min:8', Password::min(6)->numbers()->letters()->mixedCase()->symbols()]
            ];
        } else {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'display_name' => 'required',
                'email' => ['required', 'email', Rule::unique('customers')->ignore($userId)],
            ];
        }
    }
}
