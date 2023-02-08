<?php

namespace App\Services\Admin\Income;

use App\Models\Income;

class CreateIncomeService
{
    public function execute(object $request): Income
    {
        $income = Income::create([
            'title' => $request->title,
            'income_category_id' => $request->income_category,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'invoice_number' => $request->invoice_number,
        ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $url = uploadFileToPublic('income/attachment', $request->attachment);
            $income->update(['attachment' => $url]);
        }

        return $income;
    }
}
