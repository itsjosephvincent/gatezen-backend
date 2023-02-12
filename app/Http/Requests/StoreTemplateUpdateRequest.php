<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateUpdateRequest extends FormRequest
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
        $storeTemplateId = $this->route()->parameters()['store_template'];
        return [
            'store_category_id' => 'required|int',
            'name' => ['required', 'regex:/^[a-zA-Z-_ ]+$/u', Rule::unique('templates')->ignore($storeTemplateId)],
            'description' => 'required',
            'is_active' => 'required|boolean',
            'repo_url' => 'required',
            'version' => 'required',
        ];
    }
}
