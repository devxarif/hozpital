<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PatientImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[0] ?? fake()->name;
        $email = $this->generateUniqueEmail($row[1] ?? fake()->safeEmail, $name);

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
            'birth_date' => $row[5] ?? '2000-01-01',
            'age' => $row[6] ?? '23',
            'blood_group' => $row[7] ?? Arr::random(['A+','B+','O+', 'AB+','A-','B-','O-', 'AB-']),
            'address' => $row[8] ?? fake()->address,
        ]);
    }

    public function generateUniqueEmail($email, $name){
        $email_exists = User::where("email", $email)->exists();

        if ($email_exists) {
            $email = uniqid(str_replace(' ','_',strtolower($name ?? fake()->name)) . ".") . "@mail.com";
        }

        return $email;
    }

    public function startRow(): int
    {
        return 2;
    }
}
