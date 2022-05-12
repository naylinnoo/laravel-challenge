<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(LoginRequest $request): UserResource|\Illuminate\Http\JsonResponse
    {

        $credentials = $request->safe()->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return new UserResource(Auth::user());
        }
        return response()
            ->json([
                'status' => 404,
                'message' => 'Wrong Credentials'
            ], 404);

    }
}