<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WEB\UserController;
use App\Models\Contract;
use App\Models\Position;
use App\Models\Role;
use App\Models\Satker;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    public function change_password(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $validatedData = Validator::make($request->all(), [
            'currentpw' => 'required', // Custom 'password' rule to check if current password matches
            'newpw' => 'required|min:8', // confirmed rule checks if new_password_confirmation matches new_password
            'confirmpw'   => 'required|same:newpw'
        ]);
        // Custom 'password' rule to check if the current password matches
        $validatedData->after(function ($validator) use ($request) {
            if (!Hash::check($request['currentpw'], auth()->user()->password)) {
                $validator->errors()->add('currentpw', 'The current password is incorrect.');
            }
        });

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $user->password = Hash::make($request['newpw']);
        $user->update();
        return redirect()->back()->with('success', '');
    }
    public function reset_password(Request $request, User $user)
    {
        $user->update(['password' => bcrypt('PBP2023@USER')]);
        // dd($user);
        return response(true, 200)->header('Content-Type', 'text/plain');
    }

    public function profile()
    {
        $UserC = new UserController;
        $user = Auth::user();
        $user = $UserC->user_resource($user);
        return view('pages.Users.auth.PageUserProfile', [
            'user_profile' => $user,
            'auth' => $user
        ]);
    }
    public function profile_update(Request $request)
    {

        $input = $request->validated();

        $UserC = new UserController;
        $user = Auth::user();
        $user = $UserC->user_resource($user);
        return view('pages.Users.auth.PageUserProfile', [
            'user_profile' => $user,
            'auth' => $user
        ]);
    }
    public function update_view_profile()
    {
        $UserC = new UserController;
        $user = Auth::user();
        $user = $UserC->user_resource($user);
        return view('pages.Users.auth.PageUpdateProfile', [
            'user' => $user,
        ]);
    }
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $validatedData = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
                'string',
            ],
            'phone' => [
                'required',
                Rule::unique('users', 'phone')->ignore($user->id),
                'string',
            ]
        ]);
        // dd($user);
        if ($validatedData->fails()) {
            redirect()->back()->withErrors($validatedData)->withInput();
        };
        try {
            $user->update([
                "email" => $request['email'],
                "phone" => $request['phone'],
            ]);
            // $user->email = $request['email'];
            // $user->phone = $request['phone'];
            return redirect()->back()->with('success', 'profile created successfully')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'profile update failed')->withInput();
        }
    }
}
