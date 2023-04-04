<?php

namespace App\Http\Resources\Export;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientExportResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Name' => $this->user->name ?? 'No Name',
            'Email' => $this->user->email ?? 'No Email',
            'Gender' => $this->gender ?? 'No Gender',
            'Blood Group' => $this->blood_group ?? 'No Blood Group',
            'Age' => $this->age ?? 'No Age',
            'Birth Date' => $this->birth_date ?? 'No Birth Date',
            'Phone' => $this->user->contactInfo->phone ?? 'No Phone',
            'Address' => $this->user->contactInfo->address ?? 'No Address',
        ];
    }
}
