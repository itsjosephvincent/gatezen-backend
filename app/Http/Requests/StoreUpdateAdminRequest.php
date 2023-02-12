<?php

namespace App\Http\Requests;

use App\Enum\StoreStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreUpdateAdminRequest extends FormRequest
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
        $store_id = $this->route()->parameters()['store'];
        return [
            'store_name' => 'required',
            'status' => ['required', new Enum(StoreStatus::class)],
            'store_category_id' => 'int',
            'is_private' => 'required|boolean',
            'is_wholesaler' => 'boolean',
            'url' => ['required', Rule::unique('stores')->ignore($store_id)]
        ];
    }
}
