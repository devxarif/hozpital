<?php

namespace App\Exports;

use App\Http\Resources\Export\ReceptionistExportResource;
use App\Models\Receptionist;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReceptionistExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ReceptionistExportResource::collection(Receptionist::with('user:id,name,email')->get());
    }

    public function headings(): array
    {
        return [
            'Name', 'Email', 'Phone',"Address"
        ];
    }
}
