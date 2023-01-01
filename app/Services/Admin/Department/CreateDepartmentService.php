<?php

namespace App\Services\Admin\Department;

use App\Models\Department;

class CreateDepartmentService
{
    public function execute(object $request): Department
    {
        $department = Department::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = uploadFileToPublic('image', $request->image);
            $department->update(['image' => $url]);
        }

        return $department;
    }
}
