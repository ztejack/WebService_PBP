<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;


class RoleController extends Controller
{
    public function index()
    {
        return view('pages.Roles.PageDataRole', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
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
    public function destroy(Request $request)
    {
        // dd($request);
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|unique:roles|max:255',
        ]);
        try {
            $validatedData->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Success delete resource',
        ], 200);
    }
    public function update(Request $request, Role $role)
    {
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
    public function attempt_permission()
    {
    }
    public function destroy_permission()
    {
    }
}
