<?php

namespace App\Services\Admin\Manufacture;

use App\Models\Manufacture;

class UpdateManufactureService
{
    public function execute(object $request, $manufacture): Manufacture
    {
        $manufacture->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
        ]);

        return $manufacture;
    }
}
