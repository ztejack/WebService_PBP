<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users',
        ];
    }
    /**
     * the data of above request
     *
     * @return void
     */
    public function data()
    {
        return [
            'email' => request()->email,
            'token' => mt_rand(100000, 999999),
            'created_at' => now()
        ];
    }
}
