<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Employe;
use App\Models\Role;
use App\Models\Satker;
use App\Models\Subsatker;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Symfony\Component\CssSelector\Node\FunctionNode;

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
    public function show(Request $request)
    {
    }
    public function archive(Request $request)
    {
    }
    public function attemp_role_user(Request $request)
    {
    }
};
