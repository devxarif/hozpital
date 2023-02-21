<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use App\Traits\HasUserUniqueEmail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DoctorImport implements ToModel, WithStartRow
{
    use HasUserUniqueEmail;

    public function model(array $row)
    {
        $name = $row[0] ?? fake()->name;
        $email = $this->generateUserUniqueEmail($row[1] ?? fake()->safeEmail, $name);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($row[2] ?? 'password'),
            'role' => 'doctor',
        ]);

        $row_department = $row[3] ?? 'No Department';
        $department = Department::where('name', 'LIKE', "%$row_department%")->first();

        if (! $department) {
            $department = Department::first() ?? Department::create(['name' => $row_department]);
        }

        return new Doctor([
            'user_id' => $user->id,
            'department_id' => $department->id,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
