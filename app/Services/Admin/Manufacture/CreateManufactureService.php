<?php

namespace App\Services\Admin\Manufacture;

use App\Models\Manufacture;

class CreateManufactureService
{
    public function execute(object $request): Manufacture
    {
        $manufacture = Manufacture::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
        ]);

        return $manufacture;
    }
}
