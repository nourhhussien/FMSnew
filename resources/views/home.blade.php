@extends('layouts.app')

@section('content')
<div >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts Dashboard</div> 
                <div class="card-body">
                  <a href="/posts/create"> <button class="btn btn-primary btn-sm"> Create Post </button></a>
                   <h4 style="margin:20px 0;">Your Posts</h4>
                   
                </div>
               
            </div>
        </div>
    </div>
</div>
<div >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Media Dashboard</div>
                <div class="card-body">
                        <a href="/media/upload"> <button class="btn btn-primary btn-sm"> Upload Media </button></a>
                <h4 style="margin:20px 0;">Your Media</h4>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
