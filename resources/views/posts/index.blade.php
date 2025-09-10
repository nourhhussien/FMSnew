@extends('layouts.app')


@section('content')


      <h1 >posts</h1>
        @if(count($posts)>0)
            @foreach($posts as $post) 

              <div class="card  mb-2 ">
                <div class="card-body">
                  <h3 class="card-title"> <a href="/posts/{{$post->id}}"> {{$post->title}}</a>  </h3>
                  <p class="card-text">{{$post->body}}</p> 
                    <p class="card-text"><small class="text-muted">Written on {{$post->created_at}} by {{$post->User->شغ}} </small></p>

              </div>
            </div>
               
            @endforeach
        @else
            <p>No posts found</p>
        @endif

@endsection


  