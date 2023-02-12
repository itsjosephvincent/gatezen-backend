<?php

namespace App\Http\Requests;

use App\Enum\ProductStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ProductRequest extends FormRequest
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
            'store_category_id' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'retail_price' => 'required',
            'wholesale_price' => 'required',
            'status' => ['required', new Enum(ProductStatus::class)],
            'product_categories' => 'required'
        ];
    }
}
