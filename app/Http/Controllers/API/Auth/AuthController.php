<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        // if (!Auth()->attempt($data)) {
        //     return response(['error_message' => 'Incorrect Details.
        //     Please try again']);
        // }

        // $token = Auth()::user()->createToken('Laravel-9-Passport-Auth')->accessToken;
        // return response()->json(['token' => $token], 200);
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'fails',
                'message' => 'Wrong Password',
            ], 422);
        }

        $user = Auth::user();
        $token = Auth::user()->createToken('Laravel-9-Passport-Auth')->accessToken;
        return response()->json([
            'status' => 'success',
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
            // 'api-key' => new ApiKeyResource($user->apikey)
        ], 200);
    }
}
