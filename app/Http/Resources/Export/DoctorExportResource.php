<?php

namespace App\Http\Resources\Export;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorExportResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Name' => $this->user->name ?? 'No Name',
            'Email' => $this->user->email ?? 'No Email',
            'Department' => $this->department->name ?? 'No Department',
        ];
    }
}
