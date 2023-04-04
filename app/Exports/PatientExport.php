<?php

namespace App\Exports;

use App\Http\Resources\Export\PatientExportResource;
use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PatientExportResource::collection(Patient::with('user:id,name,email', 'user.contactInfo')->get());
    }

    public function headings(): array
    {
        return [
            'Name', 'Email', 'Phone', 'Gender', 'Blood Group', 'Age', 'Birth Date', 'Address',
        ];
    }
}
