<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        return $this->customrule();
    }
    public function customrule()
    {
        $user = $this->route('user');
        // dd($user);
        // $userId = User::where('slug', $user)->first();
        // dd($userId);
        $employe = $user->employee;
        // dd($userId);
        $rule = [
            'name' => 'required|string',
            'slug' => '',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
                'string',
            ],
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($user->id),
                'string',
            ],
            'phonenumber' => 'required',
            'nip' => '',
            'nik' => '',
            'npwp' => '',
            'tempat' => '',
            'tanggal' => '',
            'address' => '',
            'addressid' => '',
            'status_keluarga' => '',
            'gender' => '',
            'status_employe' => '',
            'work_location' => '',
            'religion' => '',
            'position' => '',
            'satker' => '',
            'golongan' => '',
            'date_start' => '',
            'contract' => '',
            'val_tenure' => '',
        ];
        return $rule;
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
