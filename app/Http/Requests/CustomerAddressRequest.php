<?php

namespace App\Http\Requests;

use App\Enum\CustomerAddressType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CustomerAddressRequest extends FormRequest
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
            'address_type' => ['required', new Enum(CustomerAddressType::class)],
            'care_of' => 'nullable',
            'address_1' => 'required',
            'address_2' => 'nullable',
            'city' => 'required',
            'state' => 'nullable',
            'postal_code' => 'required',
            'country_id' => ['required', 'integer'],
            'delivery_notes' => 'nullable',
        ];
    }
}
