@extends('layouts.app')

@section('content')


      

    <div class="container">
    <div class="row justify-content-center">
     <h1 class="my-3">Roles And Permissions</h1>
     <div class="d-flex justify-start mb-3 mt-3">
      <form action="{{ route('RolesAndpermissions.create_roles') }}" method="GET" style="display: inline;">
            @csrf
          <button type="submit" class="btn btn-success">Add Role <i class="fa-solid fa-circle-plus"></i></button>
        </form>
      
      </div>

      <table class="table table-hover">

<thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>


   
        @foreach($roles as $role)

      <tbody>
    <tr>            
       <td> {{ $role->name }} </td>
       <td> 
            <div class="d-flex">
               <a href="{{ route('RolesAndpermissions.edit', $role->id) }}" class="btn  btn-warning btn-sm me-2">Edit <i class="fa-solid fa-pencil"></i></a>            

               <a href="{{ route('RolesAndpermissions.delete', $role->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role?')">Delete <i class="fa-solid fa-trash"></i></a>

            </div>
         </td>
    </tr>

      </tbody>
       @endforeach
  </table>

                


        </div>
       </div>         
   
    @endsection
