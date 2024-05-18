<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\User;
use App\Core\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepository 
{
    public function create($user)
    {
        $data = new User([
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make($user->password),
        ]);

        $data->save();

        return $data;
    }

    public function getAll() 
    {
        return User::all();
    }

    public function findById($id) 
    {
        return User::find($id);
    }

    public function update($id, $userData) 
    {
        $user = User::findOrFail($id);

        $user->name = $userData->name;
        $user->email = $userData->email;
        $user->password = Hash::make($userData->password);
        $user->save();

        return $user;
    }

    public function delete($id) 
    {
        $user = User::findOrFail($id);

        $user->delete();
        return $user;
    }
}