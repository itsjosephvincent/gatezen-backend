<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'store_category_id' => 'required',
            'url' => ['required', 'unique:stores', 'regex:/^[a-zA-Z0-9- ]+$/'],
            'store_name' => 'required',
        ];
    }
}
