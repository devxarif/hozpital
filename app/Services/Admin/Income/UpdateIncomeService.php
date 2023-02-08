<?php

namespace App\Services\Admin\Income;

use App\Models\Income;

class UpdateIncomeService
{
    public function execute(object $request, object $income): Income
    {
        $income->update([
            'title' => $request->title,
            'income_category_id' => $request->income_category,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'invoice_number' => $request->invoice_number,
        ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            deleteImage($income->image);
            $url = uploadFileToPublic('income/attachment', $request->attachment);
            $income->update(['attachment' => $url]);
        }

        return $income;
    }
}
