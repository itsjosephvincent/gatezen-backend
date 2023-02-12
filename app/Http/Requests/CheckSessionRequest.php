<?php

namespace App\Http\Requests;

use App\Enum\CustomerAddressType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CheckSessionRequest extends FormRequest
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
        if (isset($this->checkout_session_id)) {
            return [
                'payment_method' => 'required',
                'address_type' => ['required', new Enum(CustomerAddressType::class)],
                'checkout_session_id' => 'required'
            ];
        }
        return [
            'payment_method' => 'required',
            'address_type' => ['required', new Enum(CustomerAddressType::class)]
        ];
    }
}
