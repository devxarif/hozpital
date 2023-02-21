<?php

namespace App\Http\Requests\Admin\BloodBank;

use Illuminate\Foundation\Http\FormRequest;

class BloodDonorCreateRequest extends FormRequest
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
            'name' => 'required',
            'blood_group' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:blood_donors,email',
            'address' => 'nullable',
            'age' => 'nullable',
        ];
    }
}
