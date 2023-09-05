<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Employe;
use App\Models\Role;
use App\Models\Satker;
use App\Models\Subsatker;
use App\Models\User;
use App\Services\UserDataFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Ui\Presets\React;
use Ramsey\Uuid\Rfc4122\UuidV4;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get()->all();

        return view(
            'pages.Users.PageUser',
            [
                'users' => (object)$users,
                // 'perusahaans' => $perusahaans,
                // 'satkers' => $satkers,
            ]
        );
    }
    public function store(StoreUserRequest $request)
    {
        $input = $request->validate();
        User::create([
            'uuid' => UuidV4::uuid4()->getHex(),
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => '$2y$10$FtYYIEupFOAr8vMAWkMu5uVmEjGRh5VEXF80UMKsIcrV.m7k7grNi',
        ]);
        return redirect()->route('user.store');
    }
    public function store_view_user(Request $request)
    {
        $satkers = Satker::all();
        $subsatkers = Subsatker::all();
        $roles = Role::all();
        return view('pages.Users.PageUserStore', [
            'satkers' => $satkers,
            'subsatkers' => $subsatkers,
            'roles' => $roles
        ]);
    }
    public function update(UpdateUserRequest $request)
    {
        $input = $request->validated();
        $user = Auth::user();
        $employee = $user->employee;

        return dd($employee->nip);
        // return Redirect::back()->with('success', 1)->withInput();
    }
    public function update_view_user(User $user)
    {
        $user = $this->user_resource($user);
        $satker = Satker::all();
        return view('pages.Users.PageUserUpdate', [
            'user' => $user,
            'satkers' => $satker
        ]);
    }
    public function show(User $user)
    {
        $user = $this->user_resource($user);
        return view("pages.Users.PageUserDetail", [
            'user' => $user,
        ]);
    }
    public function archive(Request $request)
    {
    }
    public function attemp_role_user(Request $request)
    {
    }
    public function user_resource($user)
    {
        // $user = Auth::user();
        $role_name = $user->getRoleNames()->first();
        $data = [
            'slug' => $user->slug,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'username' => $user->username,
            'role_name' => $role_name,
            'nip' => $user->employee->nip,
            'npwp' => $user->employee->npwp,
            'ttl' => $user->employee->ttl,
            'address' => $user->employee->address,
            'ktp_address' => $user->employee->ktp_address,
            'gender' => $user->employee->gender,
            'religion' => $user->employee->religion,
            'position' => $user->employee->position,
            'golongan' => $user->employee->golongan,
            'status' => $user->employee->status,
            'date_start' => $user->employee->date_start,
            // 'date_start' => '2000-07-12',
            'tenure' => $user->employee->tenure,
            'contract_type' => $user->employee->contract_type,
            'satker' => $user->satker->satker,
            'experiences' => $user->employee->experience,
        ];
        // $datax = (object)$data;
        return (object)$data;
    }
};
