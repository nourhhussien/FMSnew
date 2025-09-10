@extends('layouts.app')


@section('content')

   <h1>{{$post->title}}</h1>       
   <p >{{$post->body}}</p> 
   <hr>
    <small class="text-muted">Written on {{$post->created_at}}</small>
         
    <hr>
    @if (Auth::user())
    <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-secondary">Edit</a>

     {{ html()->form('POST', route('posts.update',$post->id))->open() }}
      {{ html()->hidden('_method', 'DELETE') }}
       
      {{ html()->submit('Delete')->class('btn btn-danger mt-2') }}
      {{ html()->form()->close() }}
      @endif 
@endsection


  