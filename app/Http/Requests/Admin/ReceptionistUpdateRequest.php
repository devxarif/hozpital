<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionistUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => "required|email|max:255|unique:users,email,{$this->receptionist->user->id}",
            'password' => 'sometimes|min:4',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:5120',
        ];
    }
}
