<?php

namespace App\Http\Requests\Admin\Bed;

use Illuminate\Foundation\Http\FormRequest;

class BedAllotmentUpdateRequest extends FormRequest
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
            'bed' => 'required|exists:beds,id',
            'patient' => 'required|exists:patients,id',
            'doctor' => 'required|exists:doctors,id',
            'allotment_time' => 'required',
            'discharge_time' => 'nullable',
            'description' => 'nullable',
        ];
    }
}
