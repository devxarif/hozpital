<?php

namespace App\Http\Requests\Admin\Setting\CMS;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCreateRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "short_description" => "required|string|max:",
            "description" => "required|string",
            "image" => 'nullable|image|mimes:png,jpg,jpeg,svg,svg|max:5120',
        ];
    }
}
