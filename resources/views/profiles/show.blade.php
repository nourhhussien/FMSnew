@extends('layouts.app')

@section('content')

 @foreach($profiles as $profile)
      
        @if (Auth::user()->id == $profile->user_id)
        
    
   

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">

                <div class="row">
                 <div class="col-md-4 text-center">


                    <img src="/photos/{{$profile->path}}" alt="{{$profile->path}}" class="img-fluid rounded-circle mb-3">
                  </div>



                <div class="col-md-8">
                       <h3>{{ Auth::user()->name }}'s Profile</h3>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Phone: {{$profile->phone}} </p>
                    <p>Address: {{$profile->address}} </p>
                    <p>Birthday: {{$profile->brithday}} </p>
                    <p>Gender: {{$profile->gender}} </p>
                    <p>Site: {{$profile->site}} </p>
                    <p>Joined on: {{ Auth::user()->created_at->format('d M Y') }}</p> 

              

                     
                 <div class="mt-3 ">
                    <a href={{ route('profile.edit', $profile->user_id) }}   class="btn btn-secondary">Edit Profile</a>
                    <a href="/" class="btn btn-primary">Back to Dashboard</a>
                 </div>

                   </div>
                </div>
                </div>
            </div>
        </div>
    </div>
       @endif
    @endforeach
    @endsection
