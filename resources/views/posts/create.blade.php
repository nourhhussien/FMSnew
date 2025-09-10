@extends('layouts.app')


@section('content')

   <h1>Create post</h1>       
   {{ html()->form('POST', route('posts.store'))->open() }}
     
      {{ html()->label('Title')->for('title') }}
      {{ html()->text('title')->class('form-control') }}
   
      {{ html()->label('Body')->for('body') }}
      {{ html()->textarea('body')->class('form-control') }}
      {{ html()->submit('Submit')->class('btn btn-primary mt-2') }}
      {{ html()->form()->close() }}
    
           
@endsection


  