<?php

namespace App\Exports;

use App\Http\Resources\Export\PharmacistExportResource;
use App\Models\Pharmacist;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PharmacistExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PharmacistExportResource::collection(Pharmacist::with('user:id,name,email')->get());
    }

    public function headings(): array
    {
        return [
            'Name', 'Email', 'Phone', 'Address',
        ];
    }
}
