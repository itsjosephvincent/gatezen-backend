<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductListingRequest extends FormRequest
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
        if (isset($this->product_categories)) {
            return [
                'page' => 'nullable',
                'sortField' => 'nullable',
                'sortOrder' => 'nullable',
                'product_categories' => 'array',
            ];
        } else {
            return [
                'page' => 'nullable',
                'sortField' => 'nullable',
                'sortOrder' => 'nullable',
            ];
        }
    }
}
