<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
// use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('pages.Roles.PageDataRole', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ]);
    }
    public function store()
    {
    }
    public function store_role()
    {
    }
    public function udapte()
    {
    }
    public function attempt_permission()
    {
    }
    public function destroy_permission()
    {
    }
}
