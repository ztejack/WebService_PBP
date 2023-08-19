<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        $token = Auth::attempt($credentials, true);
        if (!$token) {
            return response()->json([
                'status' => 'fails',
                'message' => 'Wrong Credential',
            ], 422);
        }
        return response()->json([
            'status' => 'success',
            'authorisation' => [
                'accessToken' => $token,
                'type' => 'bearer',
            ],
        ], 200);
    }

    /**
     * Log out
     *
     * Log out the user and delete the token.
     *
     * @response 200 scenario="Ok"
     * {
     *  "status": "success",
     *  "message": "Successfully logged out"
     * }
     */
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ], 200);
    }

    public function refresh()
    {
        try {
            // Refresh the token
            return response()->json([
                'token' => Auth::refresh(),
                // 'token' => $newToken,
                'type' => 'bearer',
            ], 200);
        } catch (\Throwable $th) {
            // Handle the exception
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while creating the Token.'
            ], 500);
        }
    }

    public function ChangePassword(Request $request)
    {
        // dd($request->get('old_password'));

        $validator = Validator::make($request->all(), [
            'old_password'        => 'required',
            'new_password'         => 'required|min:8|max:30',
            'confirm_password' => 'required|same:new_password'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'message' => 'validations fails',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return response()->json([
                'message' => ' password successfully updated',
                'errors' => $validator->errors()
            ], 200);
        } else {
            return response()->json([
                'message' => 'old password does not match',
                'errors' => $validator->errors()
            ], 422);
        }
    }
}
