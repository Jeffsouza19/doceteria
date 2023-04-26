<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * @group Auth Managent
 *
 * APIs to manage the Auth resource
 */

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];


    }

    public function logout($id){

    }

    public function register(RegisterRequest $request, UserService $service){


        $created = $service->store($request->only([
            'name',
            'email',
            'password',
            'password_confirm'
        ]));

        return new UserResource($created);
    }
}
