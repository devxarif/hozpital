<?php

namespace App\Imports;

use App\Models\Laboratorist;
use App\Models\User;
use App\Traits\HasUserUniqueEmail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LaboratoristImport implements ToModel, WithStartRow
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
            'role' => 'laboratorist',
        ]);

        return new Laboratorist([
            'user_id' => $user->id,
            'phone' => $row[3] ?? fake()->phoneNumber,
            'address' => $row[4] ?? fake()->address,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
