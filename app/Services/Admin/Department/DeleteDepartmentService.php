<?php

namespace App\Services\Admin\Department;

class DeleteDepartmentService
{
    public function execute(object $department)
    {
        deleteImage($department->image);
        $department->delete();

        return $department;
    }
}
