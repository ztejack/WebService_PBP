<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Mail\SendCodeResetPassword;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function __invoke(ForgotPasswordRequest $request)
    {
        // $data = $request->validate([
        //     'email' => 'required|email|exists:users',
        // ]);

        // Delete all old code that user send before.
        PasswordReset::where('email', $request->email)->delete();

        // Generate random code
        $data['code'] = mt_rand(100000, 999999);

        // Create a new code
        $codeData = PasswordReset::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeResetPassword($codeData->token));

        return response([null, trans('passwords.sent')], 200);
    }
}
