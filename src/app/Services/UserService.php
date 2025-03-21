<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService{

    public function __construct(protected UserRepository $userRepository)
    {

    }

    public function login(array $user){
        $loginUser = $this->userRepository->getUserByEmail($user['email']);


        if(!$loginUser || !Hash::check($user['password'], $loginUser->password)){
            throw ValidationException::withMessages([
                'credentials' => ['Invalid credentials']
            ]);
        }

        $token = $loginUser->createToken('api-token')->plainTextToken;

        return $token;
    }


    public function register(array $user){
        $user['password'] = Hash::make($user['password']);
        return $this->userRepository->createUser($user);
    }

}
