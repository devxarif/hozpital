<?php

namespace App\Imports;

use App\Models\Patient;
use App\Models\User;
use App\Traits\HasUserUniqueEmail;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PatientImport implements ToModel, WithStartRow
{
    use HasUserUniqueEmail;

    public function model(array $row)
    {
        $name = $row[0] ?? fake()->name;
        $email = $this->generateUserUniqueEmail($row[1] ?? fake()->safeEmail, $name);
        $date_of_birth = Carbon::parse($row[5])->format('Y-m-d') ?? Carbon::parse('2000-01-01')->format('Y-m-d');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($row[2] ?? 'password'),
            'role' => 'patient',
        ]);

        return new Patient([
            'user_id' => $user->id,
            'gender' => $row[3] ?? Arr::random(['male', 'female']),
            'phone' => $row[4] ?? fake()->phoneNumber,
            'birth_date' => $date_of_birth,
            'age' => $row[6] ?? '23',
            'blood_group' => $row[7] ?? Arr::random(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']),
            'address' => $row[8] ?? fake()->address,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
