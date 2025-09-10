
@extends('layouts.app')

@section('content')



        <div class="mt-2 container">

            <div class="d-flex justify-content-end mb-3">
                
              <a href="/users" class="btn btn-secondary">back</a>
           
            </button>

            </div>
          <h1 class="my-3">Add New User</h1>
     <form action="{{ route('users.store') }}" method="POST">
      @csrf
  <div class="form-group mt-2">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter name">
  </div>

  <div class="form-group mt-2">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" placeholder="Enter email">
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
    <select class="form-control" id="role" name="role">
      @foreach($roles as $role)
      <option value="{{ $role->name }}">{{ $role->name }}</option>
      @endforeach
    </select>
  </div>



<button type="submit" class="btn btn-success mt-4 btn-sm">Submit</button>
</form>
   

        </div>









        
  @endsection







