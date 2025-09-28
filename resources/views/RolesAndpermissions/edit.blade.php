@extends('layouts.app')

@section('content')

   <div class="container">
    <div class="row justify-content-center">
     <h1 class="my-3">Update roles</h1>
            <div class="d-flex justify-content-end mb-3"> 
              <a href="/RolesAndpermissions/show" class="btn btn-secondary">back</a>
            </div>
        
       <div class="mb-3 d-flex  ">

         <div>
             <form action="{{ route('RolesAndpermissions.update' , $role->id )}}" method="POST">
           @method('PUT')

              @csrf
            <label class="form-label" for="name">{{ __('Role Name') }}</label>
            <input type="text" class="form-control" id="Role" required name="role_name" value="{{ $role->name }}">
            
          </div>
       </div>
        
    <div class="row ">
  
    <div class="col-8 ">
      <h2>Permissions</h2>
      <table class="table table-hover">

<thead>
        <tr>
            <th scope="col">{{ ('Name') }}</th>
            <th scope="col">{{ ('Permisssion') }}</th>
        </tr>
        </thead>
     @foreach ( $permissions as $Permission  )
      <tbody>
   <tr>            
    <td>{{ $Permission->name}}</td>
 <td>
   <div>  
    <input class="form-check-input" type="checkbox" 
     value={{$Permission->id}} 
      name="permissions[]"   
     {{ in_array($Permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}  >
    <label class="checkmark" for="permission_{{ $Permission->id }}"></label>
  </div>
</td>  
    </tr>

      </tbody>
      @endforeach  
  </table>
</div>
    

       
</div> 


   <div class="d-flex justify-content-end">
           <button type="submit" class="btn btn-success mt-4 btn-sm" value="{{ ('update') }}">Submit</button>
   
  </div>
    </form>
        </div>
       </div>         

    @endsection
