@extends('layouts.app')

@section('content')

   <div class="container">
    <div class="row justify-content-center">
     <h1 class="my-3">Update roles</h1>
        
        
       <div class="mb-3 d-flex  ">

         <div>
             <form action="{{ route('RolesAndpermissions.edit' , $role->id )}}" method="GET">
              @csrf
            <label class="form-label" for="name">{{ __('Role Name') }}</label>
            <input type="text" class="form-control" id="Role" required name="name" value="{{ $role->name }}">
            
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
     @foreach ( $permissions as $Permission  )
      <tbody>
   <tr>            
    <td>{{ $Permission->name}}</td>
 <td>
   <div>  
    <input class="form-check-input" type="checkbox" id="permission_{{ $Permission->id }}" value={{ old('name', $Permission->name ) }}  name="Permission[]">
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
                <input type="submit" class="btn btn-success" value="{{ __('Update') }}"  />
    </form>
  </div>
   
        </div>
       </div>         

    @endsection
