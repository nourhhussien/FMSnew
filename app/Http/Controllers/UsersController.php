<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\profile;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;



class UsersController extends Controller
{

     public function create(Request $request){

          $roles = Role::all();
             return view('Users.add', compact('roles') );
     }


    public function show()
    {
        $users = User::all();
            $roles = Role::all();
            $permissions = Permission::all();


        return view('Users.show' , compact('users'));

    }





    public function edit($user_id)
    {
        $user = User::find($user_id);
        $roles = Role::all();
        if (!$user) {
            return redirect()->route('users.show')->with('error', 'User not found.');
        }
        return view('Users.edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'nullable',
        ]);

        $user = User::find($request->id);
        if (!$user) {
            return redirect()->route('users.show')->with('error', 'User not found.');
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        if (!empty($validated['role'])) {
            $user->syncRoles([$validated['role']]);
        }

        return redirect()->route('users.show')->with('success', 'User updated successfully.');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.show')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('users.show')->with('error', 'User not found.');
        }
    }


    public function block($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->status = 0; // Set status to 0 (blocked)
            $user->save();
            return redirect()->route('users.show')->with('success', 'User blocked successfully.');
        } else {
            return redirect()->route('users.show')->with('error', 'User not found.');
        }
    }

    public function unblock($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->status = 1; // Set status to 1 (active)
            $user->save();
            return redirect()->route('users.show')->with('success', 'User unblocked successfully.');
        } else {
            return redirect()->route('users.show')->with('error', 'User not found.');
        }
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'nullable',
        
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'status' => 1,
    ]);

    if (!empty($validated['role'])) {
        $user->assignRole($validated['role']);
    }

    return redirect()->route('users.create')->with('success', 'User created successfully.');
}

}
