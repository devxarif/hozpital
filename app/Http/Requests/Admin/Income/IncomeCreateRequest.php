<?php

namespace App\Http\Requests\Admin\Income;

use Illuminate\Foundation\Http\FormRequest;

class IncomeCreateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'income_category' => 'required|exists:income_categories,id',
            'invoice_number' => 'nullable',
            'amount' => 'required',
            'date' => 'nullable',
            'description' => 'nullable',
            'attachment' => 'nullable',
        ];
    }
}
