<?php

namespace App\Services\Admin\Department;

use App\Models\Department;

class UpdateDepartmentService
{
    public function execute(object $request, object $department): Department
    {
        $department->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            deleteImage($department->image);
            $url = uploadFileToPublic('department/image', $request->image);
            $department->update(['image' => $url]);
        }

        return $department;
    }
}
