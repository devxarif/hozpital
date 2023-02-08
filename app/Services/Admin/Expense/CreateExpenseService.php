<?php

namespace App\Services\Admin\Expense;

use App\Models\Expense;

class CreateExpenseService
{
    public function execute(object $request): Expense
    {
        $expense = Expense::create([
            'title' => $request->title,
            'expense_category_id' => $request->expense_category,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'invoice_number' => $request->invoice_number,
        ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $url = uploadFileToPublic('expense/attachment', $request->attachment);
            $expense->update(['attachment' => $url]);
        }

        return $expense;
    }
}
