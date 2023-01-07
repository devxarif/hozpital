<?php

namespace App\Http\Requests\Admin\Medicine;

use Illuminate\Foundation\Http\FormRequest;

class MedicineUpdateRequest extends FormRequest
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
            'medicine_category' => 'required|exists:medicine_categories,id',
            'manufacture' => 'required|exists:manufactures,id',
            'name' => "required|max:255|unique:medicines,name,{$this->medicine->id}" ,
            'buying_price' => 'nullable',
            'selling_price' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,svg|max:5120',
            'description' => 'nullable',
            'expire_date' => 'nullable',
        ];
    }
}
