<?php

namespace App\Http\Requests\Admin\Leave;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LeaveRequestSaveRequest extends FormRequest
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
            'leave_type' => 'required|exists:leave_types,id',
            'user' => [Rule::requiredIf(!empty($this->request_for && $this->request_for != 'me'), 'required|exists:users,id')],
            'start' => 'required|date',
            'end' => 'required|date',
            'reason' => 'required',
            'status' => 'required',
        ];
    }
}
