<?php

namespace App\Http\Requests;

use App\Enum\StoreCategoryStatus;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreCategoryStoreRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[0-9a-zA-Z-_ ]+$/u', Rule::unique('store_categories')],
            'description' => 'required',
            'status' => ['required', new Enum(StoreCategoryStatus::class)],
        ];
    }
}
