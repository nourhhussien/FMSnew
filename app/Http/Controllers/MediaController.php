<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Media; // Assuming you have a Media model

use Illuminate\Routing\Controller as BaseController;

class MediaController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); // Apply auth middleware to all methods except index and show
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::all(); // Fetch all media from the database
        return view('media.index', compact('media')); // Return the view with media data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('media.create'); // Return the view for creating a new media item
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $file = $request->file('file');
          $photoName = $file->getClientOriginalExtension();
        $updatedFileName = time() . '.' . $photoName;
        $file->move(public_path('photos'), $updatedFileName);
         $media = new Media();
        $media->name = $updatedFileName;
       $media->user_id = \Illuminate\Support\Facades\Auth::user()->id; // Use Auth facade to get the authenticated user's id

        $media->save(); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $media = Media::findOrFail($id); // Fetch the media item by ID
        return view('media.show', compact('media')); 


    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $media = Media::findOrFail($id); // Fetch the media item by ID
          unlink(public_path('photos/' . $media->name)); // Delete the file from the server
        $media->delete(); // Delete the media item
        return redirect()->route('media.index')->with('success', 'Media deleted successfully'); // Redirect back to index with success message  
    }
}
