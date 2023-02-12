<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use phpDocumentor\Reflection\Types\Nullable;

class UserRequest extends FormRequest
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
        if (isset($this->street)) {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', 'email'],
                'mobile' => 'required',
                'password' => 'required',
                'address' => 'nullable',
                'street' => 'nullable',
                'city' => 'required',
                'postal' => 'required',
                'country' => 'required',
                'tgi_user_id' => 'required',
                'tgi_referral_code' => 'required',
                'partner_role_name' => 'required',
                'created_on_date' => 'required',
                'portal_id' => 'required',
                'portal_name' => 'required',
                'role_id' => 'required',
                'is_partnership_paid' => 'required',
                'account_type' => 'required',
                'company_name' => 'nullable',
                'company_registration_number' => 'nullable',
                'company_address' => 'nullable',
                'euro_in_tokens' => 'nullable',
                'euro_in_shares' => 'nullable',
            ];
        } else {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', 'email'],
                'mobile' => 'required',
                'password' => 'required',
                'address' => 'nullable',
                'city' => 'required',
                'postal' => 'required',
                'country' => 'required',
                'tgi_user_id' => 'required',
                'tgi_referral_code' => 'required',
                'partner_role_name' => 'required',
                'created_on_date' => 'required',
                'portal_id' => 'required',
                'portal_name' => 'required',
                'role_id' => 'required',
                'is_partnership_paid' => 'required',
                'account_type' => 'required',
                'company_name' => 'nullable',
                'company_registration_number' => 'nullable',
                'company_address' => 'nullable',
                'euro_in_tokens' => 'nullable',
                'euro_in_shares' => 'nullable',
            ];
        }
    }
}
