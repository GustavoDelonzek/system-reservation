<?php

namespace App\Repositories;

use App\Models\User;
use Exception;

class UserRepository{
    public function getAllUsers(){
        return User::all();
    }

    public function getUserById(int $id){
        return User::findOrFail($id)->first();
    }

    public function getUserByEmail($email){
        $user = User::where('email', $email)->first();

        if(!$user){
            throw new Exception("User not found");
        }

        return $user;
    }

    public function createUser(array $user){
        return User::create($user);
    }

    public function is_admin(int $id){
        $user = User::findOrFail($id);
        return $user->role === 'admin';
    }


}
