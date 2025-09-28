@extends('layouts.app')

@section('content')



        <div class="mt-2 container">

        
          <h1 class="my-3">Edit User</h1>
              <div class="d-flex justify-content-end mb-3"> 
              <a href="/users" class="btn btn-secondary">back</a>
            </div>
     <form action="{{ route('users.update', $user->id ) }}" method="POST">
         @method('PUT')
      @csrf
  <div class="form-group mt-2">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="name" value="{{ old('name' , $user->name) }}" name="name" aria-describedby="nameHelp" placeholder="Enter name">
  </div>

  <div class="form-group mt-2">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email"  name="email" value="{{ old('email', $user->email) }}" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
    
  <div class="form-group mt-2">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>

  <div class="form-group mt-2">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
  </div>
   
  <div class="form-group mt-2">
    <label for="exampleInputRole">Assign Role</label>
    <select   class="form-control" id="role" name="role">
      @foreach($roles as $role)
      <option value="{{ $role->name }}">{{ $role->name }}</option>
      @endforeach
    </select>
  </div>
<button type="submit" class="btn btn-success mt-4 btn-sm" value="{{ ('update') }}">Submit</button>
</form>
        </div>        
  @endsection







