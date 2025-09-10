@extends('layouts.app')


@section('content')

   <h1>Media  preview </h1>  
   <hr> 
   <a href="/media" class="btn btn-secondary">Go Back </a>   

      @if (Auth::user())
     {{ html()->form('POST', route('media.delete',$media->id))->open() }}
      {{ html()->hidden('_method', 'DELETE') }}
       
      {{ html()->submit('Delete')->class('btn btn-danger mt-2') }}
      {{ html()->form()->close() }}
      @endif
    <hr>


    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-offset-4">
          <img src="/photos/{{$media->name}}" class="img-responsive img-thumbnail" alt="{{$media->name}}" style="width: 100%; height: 100%;">
       </div>
      </div>   

@endsection

