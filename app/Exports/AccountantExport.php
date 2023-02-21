<?php

namespace App\Exports;

use App\Http\Resources\Export\AccountantExportResource;
use App\Models\Accountant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountantExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return AccountantExportResource::collection(Accountant::with('user:id,name,email')->get());
    }

    public function headings(): array
    {
        return [
            'Name', 'Email', 'Phone', 'Address',
        ];
    }
}
