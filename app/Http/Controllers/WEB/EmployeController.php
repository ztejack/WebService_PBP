<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\GajiSlip;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $users = User::where('username', '!=', 'superuser')->get();
        // $users = User::all();
        // dd($usersx, $users);
        $collectionuser = $users->map(function ($user) {
            return $this->employeresource($user);
        });
        return view('pages.Employe.PageEmploye', [
            'users' => $collectionuser,
        ]);
    }
    public function employeresource($user)
    {
        $data = [
            'golongan' => $user->golongan->golongan,
            'position' => $user->position->position,
            'slug' => $user->slug,
            'name' => $user->name,
            'status' => $user->employee->status,
            'contract' => $user->getContrackAttribute(),
        ];
        return (object)$data;
    }
    public function view_employe()
    {
    }
    public function update()
    {
    }
    public function search()
    {
    }
    public function findByUuid($uuid)
    {
        $employee = Employe::where('uuid', $uuid)->first();

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json(['employee' => $employee]);
    }
}
