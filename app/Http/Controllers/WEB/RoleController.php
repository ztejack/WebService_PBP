<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;


class RoleController extends Controller
{
    public function index()
    {
        // Retrieve all permissions


        // Check if the authenticated user is a super user
        
        // Exclude the "delete" permission if the user is not a super user
        if (!Gate::allows('SuperUserManagement')) {
            $permissions = Permission::where(function ($query) {
                $query->where('name', '!=', 'SuperUserManagement')
                    ->where('name', '!=', 'AprovalGajiSU');
            })->get();
            // $permissions = $permissions->reject(function ($permission)
            // use ($array) {
            //     return $permission->name === $array;
            // });
            // dd($permissions);
            return view('pages.Roles.PageDataRole', [
                'roles' => Role::all(),
                'permissions' => $permissions,
            ]);
        }
        $permissions = Permission::all();
        return view('pages.Roles.PageDataRole', [
            'roles' => Role::all(),
            'permissions' => $permissions,
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|unique:roles|max:255',
        ]);
        // dd($validatedData);
        if ($validatedData->fails()) {
            // return Redirect::back()->with('errors', 0)->withInput();
            return Redirect::back()->withErrors($validatedData)->withInput();
        }
        $role = Role::create(['name' => $request->input('name')]);

        if ($role) {
            return redirect()->back()->with('success', 'Role created successfully');
        } else {
            return redirect()->back()->with('error', 'Role creation failed')->withInput();
        }
    }
    public function destroy(Request $request, Role $role)
    {
        if (in_array($role->name, ['SuperUser', 'Admin', 'Guest', 'Employe'])) {
            return Redirect::back()->with('err', 'Role ini tidak dapat di hapus')->withInput();
        };
        try {
            $role->delete();
            return redirect()->back()->with('success', '')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Gagal Menghapus Role')->withInput();
        }
    }
    public function update(Request $request, Role $role)
    {
        if (!Auth::user()->isSuperUser() && $role->name != "SuperUser") {
            return Redirect::back()->with('err', 'Anda tidak memiliki hak untuk mengelola Resource')->withInput();
        }
        $rule = [
            'name' => [
                'required',
                Rule::unique('roles', 'name')->ignore($role->id),
                'string',
            ]
        ];
        $validatedData = Validator::make(
            $request->all(),
            $rule,
        );
        if ($validatedData->fails()) {
            // return Redirect::back()->with('errors', 0)->withInput();
            return Redirect::back()->withErrors($validatedData)->withInput();
        }

        $role->name = $request->name;
        $role->update();
        return redirect()->back()->with('success', '')->withInput();
    }
    public function attempt_permission(Request $request, Role $role)
    {
        $selectedPermissionIds = $request->input('permissions', []);
        if (!auth()->user()->can('SuperUserManagement') && in_array('1', $selectedPermissionIds)) {
            return Redirect::back()->with('err', 'Anda tidak memiliki hak untuk mengelola Resource')->withInput();
        } else if ($role->name == "SuperUser") {
            return Redirect::back()->with('err', 'Anda tidak memiliki hak untuk mengelola Resource')->withInput();
        } else {
            $this->sync_permission($selectedPermissionIds, $role);
            return redirect()->back()->with('success', '')->withInput();
        }
    }

    function sync_permission($array, $role)
    {
        try {
            $role->permissions()->sync($array);
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Gagal menerapkan permission')->withInput();
        }
    }
}
