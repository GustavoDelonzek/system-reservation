<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function login(UserLoginRequest $request)
    {
        $user = $request->validated();

        $token = $this->userService->login($user);

        return response()->json([
            'token' => $token
        ]);

    }

    public function register(UserRegisterRequest $request){
        $user = $request->validated();

        $this->userService->register($user);

        return response(status: 201);
    }
}
