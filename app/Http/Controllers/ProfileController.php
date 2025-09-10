<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Profile; // Assuming you have a Post model
use Illuminate\Http\Request;

class ProfileController extends Controller
{ 
    public function index()
    {
        return view("profile.index"); // Return the profile index view
    }

    public function show( )
    {
        $user = \Illuminate\Support\Facades\Auth::user(); // Get the authenticated user
        $profiles = profile::all(); // Assuming you want to edit the profile of the authenticated user

        return view('profiles.show', compact('profiles')); // Return the profile show view with user data
    }

    public function edit($id)
    { 
         $user = \Illuminate\Support\Facades\Auth::user(); // Get the authenticated user 
        $profiles = profile::all();
        return view('profiles.edit', compact('profiles')); // Return the profile edit view with user data
    }

    public function update(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user(); 
        $profiles = Profile::where('user_id', $user->id)->first(); 

        $profiles->update($request->only(['phone', 'address', 'site', 'brithday','path']));  

        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $photoName = $file->getClientOriginalExtension();
            $updatedFileName = time() . '.' . $photoName;
            $file->move(public_path('photos'), $updatedFileName);
            $profiles->path = $updatedFileName; 
        }

        $profiles->save(); 
        return redirect()->back()->with('success','Profile updated successfully'); 
    }

}
