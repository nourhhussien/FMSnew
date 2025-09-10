<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User; // Assuming you have a User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class PasswordController extends Controller
{
    
    public function show()
    {
        return view('profiles.password'); // Return the password change view
    }



    public function store(Request $request)
    {   
        $request->validate([    

            "password"=> "required|min:8|confirmed",
            "password_confirmation"=> "required|min:8"
            ]);
            $user = User::create([
                "password"=> bcrypt($request->password),
            ]);
            return redirect()->back()->with('success', 'Password updated successfully');
    }

    public function edit()
    {
        
        return view('profiles.password'); // Return the password edit view
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if(!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user = User::find(Auth::id()); // Ensure $user is an Eloquent model instance
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->back()->with('success','Password updated successfully'); // Redirect back with success message
    }



    
}
