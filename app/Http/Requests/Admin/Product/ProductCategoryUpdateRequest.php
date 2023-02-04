<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => "required|max:255|unique:product_categories,name,{$this->productCategory->id}",
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:5120',
        ];
    }
}
