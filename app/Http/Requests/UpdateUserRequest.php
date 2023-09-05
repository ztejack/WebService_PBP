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
        $userId = User::where('slug', $user)->first();
        $employe = $userId->employee;
        // dd($userId);
        $rule = [
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
                'string',
            ],
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($userId),
                'string',
            ],
            'phonenumber' => 'required',
            'nip' =>
            [
                'required',
                Rule::unique('employes', 'nip')->ignore($employe),
                'string',
            ],
            'nik' =>
            [
                'required',
                Rule::unique('employes', 'nik')->ignore($employe),
                'string',
            ],
            'npwp' =>
            [
                'required',
                Rule::unique('employes', 'npwp')->ignore($employe),
                'string',
            ],
            'tempat' => 'string',
            'tanggal' => 'string',
            'address' => 'string',
            'addressid' => 'string',
            'gender' => 'string',
            'religion' => 'string',
            'position' => 'string',
            'golongan' => 'string',
            'date_start' => 'string',
            'contract' => 'string',
            'val_tenure' => 'string',
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
