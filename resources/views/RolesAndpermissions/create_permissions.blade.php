@extends('layouts.app')

@section('content')


      

   <div class="container">
    <div class="row justify-content-center">
     <h1 class="my-3">Create Permissions</h1>
        
        
       <div class="mb-3 d-flex">

         <div>
             <form action="{{ isset($editPermission)? route('permissions.update', $editPermission->id): url('/RolesAndpermissions/create_permissions') }}" method="POST" >
              @csrf

            
            <label class="form-label" for="permissions">{{ __('permission') }}</label>
            <input type="text" class="form-control" id="permissions" required   name="permission_name"  placeholder="Enter permission" value="{{ $editPermission ? $editPermission->name : '' }}">
          <button type="submit" class="btn btn-{{ isset($editPermission) ? 'warning' : 'primary' }} mt-3">
        {{ isset($editPermission) ? 'Update Permission' : 'Add Permission' }}
     </button>
             </form>
             
          </div>
       </div>
        
  
      <h2>Permissions</h2>
      <table class="table table-hover">

<thead>
        <tr>
          
            <th scope="col">permissions</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
     @foreach ( $permissions as $permission)
      <tbody>
   <tr>            
    <td>{{ $permission->name}}</td>
  
<td> 
                <a href="{{ url('/RolesAndpermissions/create_permissions') }}?edit={{ $permission->id }}" class="btn btn-warning btn-sm me-2">Edit</a>
               <a href="{{ route('RolesAndpermissions.delete_permissions', $permission->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this permission?')">Delete <i class="fa-solid fa-trash"></i></a>

</td>
    </tr>

      </tbody>
      @endforeach  
  </table>


  
        </div>
       </div>         

    @endsection
