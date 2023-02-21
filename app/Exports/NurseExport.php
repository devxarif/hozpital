<?php

namespace App\Exports;

use App\Http\Resources\Export\NurseExportResource;
use App\Models\Nurse;
use Maatwebsite\Excel\Concerns\FromCollection;

class NurseExport implements FromCollection
{
    public function collection()
    {
        return NurseExportResource::collection(Nurse::with('user:id,name,email')->get());
    }

    public function headings(): array
    {
        return [
            'Name', 'Email', 'Phone', 'Address',
        ];
    }
}
