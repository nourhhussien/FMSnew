<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Assuming you have a Post model
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class postsController extends BaseController
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
        $posts = Post::all(); // Fetch all posts from the database
        return view('posts.index', compact('posts')); // Return the view with posts data
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create'); // Return the view for creating a new post

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255', 
            'body' => 'required', 
        ]);
        $post = new Post; 
        $post->title = $request->input('title'); 
        $post->body = $request->input('body'); 
        $post->user_id = \Illuminate\Support\Facades\Auth::user()->id; // Use Auth facade to get the authenticated user's id
        $post->save(); 
        // Post::create($request->all()); // Create a new post using mass assignment 
        return redirect()->route('posts.index')->with('success', 'Post created successfully'); // Redirect to index with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id); // Fetch the post by ID or fail if not found
        return view('posts.show', compact('post')); // Return the view with the post data 
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id); // Fetch the post by ID or fail if not found
       return view('posts.edit',['post'=>$post] ); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $post = Post::findOrFail($id); 
       $post->title = $request->input('title');
       $post->body = $request->input('body');
       $post->save(); // Save the updated post
       return redirect()->route('posts.index')->with('success', 'Post updated successfully'); // Redirect to index with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id); // Fetch the post by ID or fail if not found
        $post->delete(); // Delete the post
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully'); //
    }
}
