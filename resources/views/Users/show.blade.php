@extends('layouts.app')

@section('content')



   <div class="mt-5">
     <form class="d-flex " role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      </div>
      <div class="d-flex justify-content-end mt-4">
      <a href="/users/create" class="btn btn-secondary" > Add <i class="fa-solid fa-user-plus"></i></a>
      </div>

<table class="table table-hover">

<thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>


    @foreach($users as $user)
      
    
      @if(Auth::user()->hasRole('admin') )



      
      <tbody>
<tr>            
        <td> {{ $user->id }}</td>
        <td> {{ $user->name }} </td>
        <td> {{ $user->email }} </td>
        <td> 
          @foreach($user->roles as $userRole)
          {{ $userRole->name }}
          @endforeach
         
        </td>

        
        <td>
        <a href="{{ route('users.edit', $user->id) }}" class="btn  btn-warning "><i class="fa-solid fa-pencil"></i></a>

        @if($user->status == '1')
        <form action="{{ route('users.block', $user->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-ban"></i></button>
        </form>
        @else

        <form action="{{ route('users.unblock', $user->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
        </form>
        @endif
        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>
      </tbody>
        @endif
  @endforeach   
  </table>

                
  @endsection







