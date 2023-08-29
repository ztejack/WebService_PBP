<?php

namespace App\Services;

class UserDataFormatter
{
    public static function format($user)
    {
        // Your data formatting logic here
        return [
            'nama' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'username' => $user->username,
            'role_name' => $user->getRoleNames()->first(),
            'nip' => $user->employee->nip,
            'npwp' => $user->employee->npwp,
            'ttl' => $user->employee->ttl,
            'address' => $user->employee->address,
            'ktp_address' => $user->employee->ktp_address,
            'gender' => $user->employee->gender,
            'religion' => $user->employee->religion,
            'blood_type' => $user->employee->blood_type,
            'golongan' => $user->employee->golongan,
            'status' => $user->employee->status,
            'date_start' => $user->employee->date_start,
            'tenure' => $user->employee->tenure,
            // 'contact_type' => $user->employee->contact_type,
            'contact_type' => '123',
            'subsatker' => $user->subsatker->subsatker,
            'satker' => $user->satker->satker,
            // 'subsatker' => $user->subsatker->subsatker,
            // 'satker' => $user->subsatker->satker->satker,
        ];
    }
}
