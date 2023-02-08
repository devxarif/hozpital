<?php

namespace App\Http\Requests\Admin\Expense;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseUpdateRequest extends FormRequest
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
            'expense_category' => 'required|exists:expense_categories,id',
            'invoice_number' => 'nullable',
            'amount' => 'required',
            'date' => 'nullable',
            'description' => 'nullable',
            'attachment' => 'nullable',
        ];
    }
}
