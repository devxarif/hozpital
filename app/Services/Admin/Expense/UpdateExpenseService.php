<?php

namespace App\Services\Admin\Expense;

use App\Models\Expense;

class UpdateExpenseService
{
    public function execute(object $request, object $expense): Expense
    {
        $expense->update([
            'title' => $request->title,
            'expense_category_id' => $request->expense_category,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'invoice_number' => $request->invoice_number,
        ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            deleteImage($expense->image);
            $url = uploadFileToPublic('expense/attachment', $request->attachment);
            $expense->update(['attachment' => $url]);
        }

        return $expense;
    }
}
