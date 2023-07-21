<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{

    public function getListUsers()
    {
        $data = User::all();
        return $data;
    }
    public function create($request)
    {
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'isAdmin' => $data['isAdmin'] == "1" ? true : false,
            'isActive' => true
        ]);
    }

    public function update(User $user, $request)
    {
        $data = $request->all();

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'isAdmin' => $data['isAdmin'] == "1" ? true : false,
            'isActive' => $data['isActive'] == "1" ? true : false,
        ]);

        $user->save();
    }
}
