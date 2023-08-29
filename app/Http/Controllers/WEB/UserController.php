<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Employe;
use App\Models\Role;
use App\Models\Satker;
use App\Models\Subsatker;
use App\Models\User;
use App\Services\UserDataFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Ramsey\Uuid\Rfc4122\UuidV4;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        // $perusahaans = Perusahaan::get();
        // $satkers = Satker::latest()->get();

        return view(
            'pages.Users.PageUser',
            [
                'users' => $users,
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
    public function update(Request $request)
    {
    }
    public function update_view_user(Request $request)
    {
    }
    public function profile()
    {
        $user = Auth::user();
        $role_name = $user->getRoleNames()->first();
        $data = [
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
            'tenure' => $user->employee->tenure,
            // 'contact_type' => $user->employee->contact_type,
            'contract_type' => $user->employee->contract_type,
            'subsatker' => $user->subsatker->subsatker,
            'satker' => $user->satker->satker,
        ];
        $datax = (object)$data;
        // $users = new UserDataFormatter::format($user);
        $employe = Employe::get()->first();
        // dd($datax->name);
        // return response()->json($users, 200);
        return view('pages.Users.PageUserProfile', [
            'user_profile' => $datax,
            'auth' => $user
        ]);
    }
    public function archive(Request $request)
    {
    }
    public function attemp_role_user(Request $request)
    {
    }
};
