<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Employe;
use App\Models\Experience;
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
        $positions = Position::all();
        $satkers = Satker::all();
        // dd($input);
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
        $employee->tenure = $input['val_tenure'];
        $employee->contract_type = $input['contract'];
        $employee->religion = $input['religion'];
        $employee->golongan = $input['golongan'];
        $employee->gender = $input['gender'];
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
        // dd([$employee, $user]);
        // return
        return Redirect::back()->with('success', '')->withInput();
    }
    public function update_view_user(User $user)
    {
        $optionGolongan = (object)[
            (object)['name' => 'IA', 'val' => 'IA'],
            (object)['name' => 'IB', 'val' => 'IB'],
            (object)['name' => 'IC', 'val' => 'IC'],
            (object)['name' => 'IIA', 'val' => 'IIA'],
            (object)['name' => 'IIB', 'val' => 'IIB'],
            (object)['name' => 'IIC', 'val' => 'IIC'],
            (object)['name' => 'IIIA', 'val' => 'IIIA'],
            (object)['name' => 'IIIB', 'val' => 'IIIB'],
            (object)['name' => 'IIIC', 'val' => 'IIIC'],
            (object)['name' => 'IVA', 'val' => 'IVA'],
            (object)['name' => 'IVB', 'val' => 'IVB'],
            (object)['name' => 'IVC', 'val' => 'IVC'],
            (object)['name' => 'VA', 'val' => 'VA'],
            (object)['name' => 'VB', 'val' => 'VB'],
            (object)['name' => 'VC', 'val' => 'VC'],
            (object)['name' => 'VIA', 'val' => 'VIA'],
            (object)['name' => 'VIB', 'val' => 'VIB'],
            (object)['name' => 'VIC', 'val' => 'VIC'],
            (object)['name' => 'VIIA', 'val' => 'VIIA'],
            (object)['name' => 'VIIB', 'val' => 'VIIB'],
            (object)['name' => 'VIIC', 'val' => 'VIIC'],
        ];
        $optionReligion = (object)[
            (object)['val' => 'Islam'],
            (object)['val' => 'Kristem'],
            (object)['val' => 'Hindu'],
            (object)['val' => 'Buddha'],
            (object)['val' => 'Konghucu'],
            (object)['val' => 'Other'],
        ];

        $user = $this->user_resource($user);
        // dd($optionGolongan);

        $user = $this->user_resource($user);
        $satkers = Satker::all();
        $positions = Position::all();
        return view('pages.Users.PageUserUpdate', [
            'user' => $user,
            'satkers' => $satkers,
            'positions' => $positions,
            'optiongolongans' => $optionGolongan,
            'optionreligions' => $optionReligion
        ]);
    }
    public function show(User $user)
    {
        $user = $this->user_resource($user);
        return view("pages.Users.PageUserDetail", [
            'user' => $user,
            // 'experience' => $experiences,
        ]);
    }
    public function archive(Request $request)
    {
        if ($request->accountArchive = 'on') {

            $user = User::findBySlug($request->slug);
            $user->employee->status = false;
        };
        return Redirect::back();
    }
    public function attemp_role_user(Request $request)
    {
    }
    public function user_resource($user)
    {
        $user = Auth::user();
        $role_name = $user->getRoleNames()->first();
        $parts = explode(" ", $user->employee->ttl);

        $inputString = $user->employee->tenure;
        // Split the input string by comma
        $parts = explode(",", $inputString);
        $formattedString = "Year: $parts[0], Month: $parts[1], Week: $parts[2], Days: $parts[3]";
        $formattedDate = date('Y-m-d', strtotime($user->employee->date_start));
        if ($user->employee->gender = true) {
            $gender = 'Male';
        } else {
            $gender = 'Female';
        }

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
            'tempat' => $parts[0],
            'tanggal' => $parts[1],
            'address' => $user->employee->address,
            'ktp_address' => $user->employee->ktp_address,
            'gender' => $gender,
            'religion' => $user->employee->religion,
            'position' => $user->employee->position->position,
            'golongan' => $user->employee->golongan,
            'status' => $user->employee->status,
            'date_start' => $formattedDate,
            // 'date_start' => '2000-07-12',
            'tenure' => $formattedString,
            'contract_type' => $user->employee->contract_type,
            // 'position' => $user->employee->position->position,
            'satker' => $user->satker->satker,
            'experiences' => $user->employee->experience,
        ];
        // $datax = (object)$data;
        return (object)$data;
    }
};
