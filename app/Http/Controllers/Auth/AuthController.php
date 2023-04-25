<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    }

    public function logout($id){

    }

    public function register(RegisterRequest $request, UserService $service){


        $created = $service->store($request->only([
            'name',
            'email',
            'password'
        ]));

        return new UserResource($created);
    }
}
