@extends('layouts.app')


@section('content')


      <h1 >Media</h1>
        @if(count($media)>0)

        <div class="row">
            @foreach($media as $photo) 
            
            <div class="col-md-4 col-sm-6">

                  <a href="/media/{{$photo->id}}" >

                  <img src="/photos/{{$photo->name}}" class="img-responsive img-thumbnail" alt="{{$photo->name}}" style="width: 100%; height:auto;">
                  </a>


            </div>
            
            
               
            @endforeach
         </div>
        @else
            <p>No media found</p>
        @endif

@endsection


  