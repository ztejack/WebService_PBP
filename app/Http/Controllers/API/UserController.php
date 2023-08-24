<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
    }

    /**
     *
     * @group Users
     * @authenticate
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = UserResource::collection(
            User::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('direction') : 'desc'
            )->paginate(50)
        );

        return response()->json([
            $users,
        ], 200);
    }

    /**
     * @group Users
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreuserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->validated();
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->id_subsatker = $input['id_subsatker'];
        $user->password = '12345678';
        // return $role;
        if (!is_null($input['id_role'])) {
            $user->assignRole($input['']);
        } else {
            $user->assignRole($input['id_role']);
        }
        $user->save();

        // $expirationDate = Carbon::now()->addDays(30);

        // ApiKey::create([
        //     'user_id' => $user->id,
        //     'api_key' => Str::random(32),
        //     'expiration_date' => $expirationDate,
        // ]);

        return response()->json(['status' => 'Users Berhasil Ditambahkan !'], 201);
    }

    /**
     * @group Users
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $userr = UserResource::make($user);
        return response()->json(['data' => $userr], 200);
    }

    /**
     * @group Users
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateuserRequest $request, User $user)
    {
        $input = $request->validated();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->id_subsatker = $input['id_subsatker'];
        $role = Role::findByName($user->getRoleNames()->first());
        $user->removeRole($role->id);
        $user->assignRole($input['id_role']);
        $user->update();
        return response()->json(['status' => 'Users Berhasil Diupdate !'], 201);
    }

    /**
     * @group Users
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'User Berhasil Dihapus !',
        ], 200);
    }

    public function user_atemp_role()
    {
    }
}
