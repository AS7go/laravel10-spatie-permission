<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at')->get();

        // Как вариант без вывода super-user в меню Users
        // $users = User::with('roles')->whereDoesntHave('roles', function ($query) {$query->where('name', 'super-user');})->get();

        return view('users.index', compact([
            'users'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();

        return view('users.edit', compact([
            'user',
            'roles',
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name
        ]);

        $role = Role::find($request->role_id);
        $user->syncRoles([$role->name]);

        return redirect()->back()->with('status', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
