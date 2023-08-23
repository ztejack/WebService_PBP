<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CodeCheckRequest;
use App\Models\PasswordReset;
use Illuminate\Http\Request;

class CodeCheckController extends Controller
{
    /**
     * Check if the token is exist and vaild one (Setp 2)
     *
     * @param  mixed $request
     * @return void
     */
    public function __invoke(CodeCheckRequest $request)
    {
        $passwordReset = PasswordReset::firstWhere('token', $request->token);

        if ($passwordReset->isExpire()) {
            return $this->jsonResponse(null, trans('passwords.token_is_expire'), 422);
        }

        return $this->jsonResponse(['token' => $passwordReset->token], trans('passwords.token_is_valid'), 200);
    }
}
