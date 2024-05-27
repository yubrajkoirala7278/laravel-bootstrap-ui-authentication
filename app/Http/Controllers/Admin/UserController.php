<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // public function __construct() {
    //     // permission with "edit user" can only access edit and update routes of user controller
    //     $this->middleware('permission:edit user',['only'=>['edit','update']]);
    //     // permission with "delete user" can only access destroy route of user controller
    //     $this->middleware('permission:delete user',['only'=>['destroy']]);
    // }

    public function index()
    {
        try {
            $users = User::latest()->get();
            return view('admin.users.index', compact('users'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function create()
    {
        try {
            $roles = Role::pluck('name', 'name')->all();
            return view('admin.users.create', compact('roles'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function store(UserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->syncRoles($request->roles);

            return redirect()->route('users.index')->with('success', 'User added successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit(User $user)
    {
        try {
            $roles = Role::pluck('name', 'name')->all();
            $userRoles = $user->roles->pluck('name', 'name')->all();
            return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if (!empty($request->password)) {
                $data += [
                    'password' => Hash::make($request->password),
                ];
            }

            $user->update($data);

            $user->syncRoles($request->roles);

            return redirect()->route('users.index')->with('success', 'User updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->with('success', 'User deleted successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
