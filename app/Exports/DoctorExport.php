<?php

namespace App\Exports;

use App\Http\Resources\Export\DoctorExportResource;
use App\Models\Doctor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DoctorExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DoctorExportResource::collection(Doctor::with('user:id,name,email', 'department:id,name')->get());
    }

    public function headings(): array
    {
        return [
            'Name', 'Email', 'Phone', 'Address',
        ];
    }
}
