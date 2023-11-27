<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    // **
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  *
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
        return $this->customrule();
    }
    public function customrule()
    {
        $rules = [
            'name' => 'required',
            'email' =>
            [
                'required',
                'email',
                Rule::unique('users', 'email'),
                'string',
            ],
            'username' => [
                'required',
                Rule::unique('users', 'username'),
                'string',
            ],
            'phonenumber' => 'required',
            // 'id_subsatker' => 'required',
        ];

        // $rules = [];
        // if (!is_null($this->input('id_role'))) {
        //     $rules['id_role'] = 'not_in:1';
        // } else {
        //     $rules['id_role'] = '';
        // }
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors(); // Ambil pesan error

        // Konversi pesan error ke objek
        $errorsObject = (object)$errors;

        // Flash input data ke session agar tersedia saat Anda redirect kembali
        $this->flash();

        // Buat instance ViewErrorBag dan set sebagai variabel "errors" di view
        // $errorBag = new ViewErrorBag();
        // $errorBag->put('default', $errorsObject);

        // Buang HttpResponseException dengan errorBag
        throw new HttpResponseException(
            redirect()->back()->withErrors($errorsObject)->withInput()
        );
    }
}
