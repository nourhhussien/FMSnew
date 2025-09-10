@extends('layouts.app')


@section('content')
 
   <h1>edit post</h1>       
   {{ html()->form('POST', route('posts.update',$post->id))->open() }}
     
      {{ html()->label('Title')->for('title') }}
      {{ html()->text('title', $post->title)->class('form-control') }}
   
      {{ html()->label('Body')->for('body') }}
      {{ html()->textarea('body', $post->body)->class('form-control') }}

      {{ html()->hidden('_method', 'PUT') }}
      {{ html()->submit('Submit')->class('btn btn-primary mt-2') }}
      {{ html()->form()->close() }}
    
           
@endsection

