<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SMTPUpdateRequest extends FormRequest
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
            'host' => 'required',
            'port' => 'required',
            'encryption' => 'required',
            'from_name' => 'required',
            'from_address' => 'required',
            'username' => 'required',
            'password' => 'required',
        ];
    }
}
