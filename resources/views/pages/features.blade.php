@extends('layouts.app')
@section('content')

     <h2>{{$title}} </h2> 
    
     @if(count($features) > 0)
        <ul class="list-group container ">
            @foreach($features as $feature)
                <li class="list-group-item">{{ $feature }}</li>
            @endforeach
        </ul>
    @endif
@endsection
    
 
