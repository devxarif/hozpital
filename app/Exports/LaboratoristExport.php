<?php

namespace App\Exports;

use App\Http\Resources\Export\LaboratoristExportResource;
use App\Models\Laboratorist;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaboratoristExport implements FromCollection
{
    public function collection()
    {
        return LaboratoristExportResource::collection(Laboratorist::with('user:id,name,email')->get());
    }

    public function headings(): array
    {
        return [
            'Name', 'Email', 'Phone', 'Address',
        ];
    }
}
