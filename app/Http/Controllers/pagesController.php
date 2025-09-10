<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome to me ';
       

        return view('pages.index')->with('title', $title); //this is the first way to pass data to the view
        // return view('pages.index',compact('title'));

    }
   
    public function about()
    {
         $title1= 'Welcome to about';
        return view('pages.about', compact('title1')); //this is another way to pass data to the view
    }

     public function features()
    {   
        $data= [
            'title' => 'Welcome to features',
            'features' => ['uploadMedia', 'downloadItem', 'deleteItem', 'editItem']
        ];
 
 
        return view('pages.features')->with($data); //this is another way to pass data to the
    }

   
}
