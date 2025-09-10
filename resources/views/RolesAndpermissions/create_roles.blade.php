@extends('layouts.app')

@section('content')


      

   <div class="container">
    <div class="row justify-content-center">
     <h1 class="my-3">Create New Role</h1>
        
        
       <div class="mb-3 d-flex  ">

         <div>
             <form action="{{ url('/RolesAndpermissions/create') }}" method="POST">
              @csrf
            <label class="form-label" for="name">{{ __('Role Name') }}</label>
            <input type="text" class="form-control" id="Role" required name="name" >
            
          </div>
       </div>
        
    <div class="row">
  
    <div class="col-8">
      <h2>Permissions</h2>
      <table class="table table-hover">

<thead>
        <tr>
            <th scope="col">{{ ('Name') }}</th>
            <th scope="col">{{ ('Permisssion') }}</th>
        </tr>
        </thead>
     @foreach ( $permissions as $Permission)
      <tbody>
   <tr>            
    <td>{{ $Permission->name}}</td>
   <td> <div>  
    <input class="form-check-input" type="checkbox" id="permission_{{ $Permission->id }}" value="{{ $Permission->name}}"  name="Permission[]">
    <label class="checkmark" for="permission_{{ $Permission->id }}"></label>

  </div>
</td>  
    </tr>

      </tbody>
      @endforeach  
  </table>
</div>
    
<div class="col-4 p-5"> 
    <h2>Users</h2>

       <select name="user[]" id="users" multiple>
               @foreach ($users as $user)

               <option value="{{$user->id }}">{{ $user->name }}</option>
              @endforeach
                
          </select>
       </div>
       
</div> 


   <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-success" value="{{ __('Save') }}" />
    </form>
  </div>
   
        </div>
       </div>         

    @endsection
