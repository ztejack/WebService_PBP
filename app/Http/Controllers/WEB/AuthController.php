<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WEB\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function reset_password(Request $request)
    {
        $auth = Auth::user();
        $auth->password = bcrypt('PBP2023@USER');
        $x = $auth->update();
        return response(true, 200)->header('Content-Type', 'text/plain');
    }

    public function profile()
    {
        $UserC = new UserController;
        $user = Auth::user();
        $user = $UserC->user_resource($user);
        return view('pages.Users.Auth.PageUserProfile', [
            'user_profile' => $user,
            'auth' => $user
        ]);
    }
}
