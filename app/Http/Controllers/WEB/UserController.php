<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Contract;
use App\Models\Employe;
use App\Models\Experience;
use App\Models\Golongan;
use App\Models\Position;
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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get()->all();
        // dd($users);
        return view(
            'pages.Users.PageUser',
            [
                'users' => (object)$users,
            ]
        );
    }
    public function store(StoreUserRequest $request)
    {
        $input = $request->validated();

        $uuid = UuidV4::uuid4()->getHex();
        $user = User::create([
            'uuid' => $uuid,
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'phone' => $input['phonenumber'],
            'password' => '$2y$10$FtYYIEupFOAr8vMAWkMu5uVmEjGRh5VEXF80UMKsIcrV.m7k7grNi',
        ]);
        $Role = Role::findByName('Guest');
        $user->assignRole($Role);
        return redirect()->back()->with('success', '')->withInput();
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
    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->validated();
        // $user = User::where('slug', $input['slug'])->first();
        $positions = Position::all();
        $satkers = Satker::all();
        $golongans = Golongan::all();
        $contracts = Contract::all();
        // dd($user);

        $user->name = $input['name'];
        $user->username = $input['username'];
        $user->phone = $input['phonenumber'];
        $user->email = $input['email'];
        $user->update();
        $employee = $user->employee;
        $employee->nip = $input['nip'];
        $employee->nik = $input['nik'];
        $employee->npwp = $input['npwp'];
        $employee->ttl = $input['tempat'] . ' ' . $input['tanggal'];
        $employee->address = $input['address'];
        $employee->ktp_address = $input['addressid'];
        $employee->date_start = $input['date_start'];
        $employee->status_keluarga = $input['status_keluarga'];
        $employee->tenure = $input['val_tenure'];
        // $employee->contract_type = $input['contract'];s
        $employee->religion = $input['religion'];
        // $employee->golongan = $input['golongan'];
        $employee->gender = $input['gender'];
        foreach ($contracts as $contract) {
            if ($contract->contract == $input['contract']) {
                $employee->contract_id = $contract->id;
            }
        }
        foreach ($golongans as $golongan) {
            if ($golongan->golongan == $input['golongan']) {
                $employee->golongan_id = $golongan->id;
            }
        }
        foreach ($positions as $position) {
            if ($position->position == $input['position']) {
                $employee->position_id = $position->id;
            }
        }
        foreach ($satkers as $satker) {
            if ($satker->satker == $input['satker']) {
                $employee->satker_id = $satker->id;
            }
        }

        $employee->update();
        // return redirect()->back()->with('success', '')->withInput();
        return redirect()->route('detail_view_user', $user->slug)->with('success', '');
    }
    public function update_view_user(User $user)
    {
        $optionReligion = (object)[
            (object)['val' => 'Islam'],
            (object)['val' => 'Kristem'],
            (object)['val' => 'Hindu'],
            (object)['val' => 'Buddha'],
            (object)['val' => 'Konghucu'],
            (object)['val' => 'Other'],
        ];
        $userpermission = $user->getAllPermissions();
        // dd($userpermission = $user->getPermissionNames());
        // dd($userpermission);
        $user = $this->user_resource($user);
        // dd($optionGolongan);

        // $user = $this->user_resource($user);
        $satkers = Satker::all();
        $positions = Position::all();
        $contracts = Contract::all();
        $roles = ModelsRole::all();
        $permisions = Permission::all();
        $golongans = Golongan::all();
        return view('pages.Users.PageUserUpdate', [
            'user' => $user,
            'roles' => $roles,
            'permisions' => $permisions,
            'satkers' => $satkers,
            'positions' => $positions,
            'contracts' => $contracts,
            'optiongolongans' => $golongans,
            'optionreligions' => $optionReligion,
            'userPermisions' => $userpermission->pluck('name')->toArray(),
            // 'permissions' => $user->getAllPermissions(),

        ]);
    }
    public function show(User $user)
    {
        $user = $this->user_resource($user);
        // dd($user);
        return view("pages.Users.PageUserDetail", [
            'user' => $user,
        ]);
    }
    public function activate(Request $request)
    {
        $user = User::findBySlug($request->slug);
        if ($user->status) {
            $user->status = false;
            $user->update();
            return Redirect::back();
        } else if (!$user->status) {
            $user->status = true;
            $user->update();
            return Redirect::back();
        };
    }
    public function attemp_role_user(Request $request)
    {
        if (Auth::user()->can('SuperUserManagement') && $request->role == "SuperUser") {
            $user = User::findBySlug($request->slug);
            $role = Role::findByName($request->role);
            $user->syncRoles([$role]);
        } else if (Auth::user()->can('RoleManagement') && $request->role != "SuperUser") {
            $user = User::findBySlug($request->slug);
            $role = Role::findByName($request->role);
            $user->syncRoles([$role]);
        } else if (!Auth::user()->can('SuperUserManagement') && $request->role == "SuperUser") {
            return redirect()->back()->with('err', 'THIS ACTION IS UNAUTHORIZED')->withInput();
        } else {
            return redirect()->back()->with('err', 'THIS ACTION IS UNAUTHORIZED')->withInput();
        }
        return redirect()->back()->with('success', '')->withInput();
    }

    public function attemp_permission_user(Request $request) // Error need fix later
    {
        $user = User::findBySlug($request->slug);
        $user->givePermissionTo($request->permission);
        return redirect()->back()->with('success', '')->withInput();
    }

    public function user_resource($user)
    {
        // dd($user);

        if ($user->employee->tenure != null) {
            $inputString = $user->employee->tenure;
            // Split the input string by comma
            $parts = explode(",", $inputString);
            $formattedString = "Year: $parts[0], Month: $parts[1], Week: $parts[2], Days: $parts[3]";
        }
        $parts = explode(" ", $user->employee->ttl);
        $formattedDate = date('Y-m-d', strtotime($user->employee->date_start));
        if ($user->employee->gender = true) {
            $gender = 'Male';
        } else {
            $gender = 'Female';
        }
        $role_name = $user->getRoleNames()->first();
        $data = [
            'slug' => $user->slug,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'username' => $user->username,
            'role_name' => $role_name,
            'nip' => $user->employee->nip,
            'nik' => $user->employee->nik,
            'npwp' => $user->employee->npwp,
            'tempat' => $user->employee->ttl != null ? $parts[0] : null,
            'tanggal' => $user->employee->ttl != null ? $parts[1] : null,
            'address' => $user->employee->address,
            'ktp_address' => $user->employee->ktp_address,
            'gender' => $gender,
            'status_keluarga' => $user->employee->status_keluarga,
            'status' => $user->employee->status,
            'religion' => $user->employee->religion,
            'position' => $user->employee->position != null ? $user->employee->position->position : null,
            'golongan' => $user->employee->golongan != null ? $user->employee->golongan->golongan : null,
            'status' => $user->employee->status,
            'date_start' => $formattedDate,
            'tenure' => $user->employee->tenure != null ? $formattedString : $user->employee->tenure,
            'employe_uuid' => $user->employee->uuid,
            'satker' => $user->satker->satker,
            'experiences' => $user->employee->experience,
            'contract' => $user->employee->contract != null ? $user->employee->contract->contract : null,
        ];
        // $datax = (object)$data;
        return (object)$data;
    }
};
