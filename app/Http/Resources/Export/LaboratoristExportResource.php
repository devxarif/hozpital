<?php

namespace App\Http\Resources\Export;

use Illuminate\Http\Resources\Json\JsonResource;

class LaboratoristExportResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Name' => $this->user->name ?? 'No Name',
            'Email' => $this->user->email ?? 'No Email',
            'Phone' => $this->phone ?? 'No Phone',
            'Address' => $this->address ?? 'No Address',
        ];
    }
}
