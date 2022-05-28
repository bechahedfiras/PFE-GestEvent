<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' =>$row['name'],
            'email' =>$row['email'],
            'password' =>Hash::make('password'),
            'state' =>$row['state'],
            "role_id" => 2, //user type
            'address' =>$row['address'],
            'phone_number' =>$row['phone_number'],
            'postcode' =>$row['postcode'],
        ]);
      
            
        // Assign Role To User
        $user->assignRole($user->role_id);

        return $user;
    }
}
