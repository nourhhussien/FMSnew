<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use  Spatie\Permission\Models\Permission;
use  App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RolesAndPermissionController extends Controller
{
    public function addPermissons( Request $request) {
         
            $validated = $request->validate([
                'permission_name' => 'required|string|unique:permissions,name',
                 
            ]);
            Permission::create(['name' => $validated['permission_name'] , 'guard_name' => 'web']);



        return redirect()->back()->with('success', 'Permission created successfully.');
    }


   public function showForm(Request $request) {
    $permissions = Permission::all();
    $editPermission = null;
    if ($request->has('edit')) {
        $editPermission = Permission::findOrFail($request->get('edit'));
    }   

    return view('RolesAndpermissions.create_permissions' , compact( 'permissions' , 'editPermission') ) ;
   }

   
   public function updatePermission(Request $request, $id){

    $validated = $request->validate([
       'permission_name' => 'required|string|unique:permissions,name,' . $id,
         
    ]);
    $permission = Permission::findById($id);
     
    $permission->update(['name' => $validated['permission_name']]);

     return redirect()->route('RolesAndpermissions.showForm')->with('success', 'Permission updated successfully.');
   }



    public function show(){
        $roles = role::all();
        return view('RolesAndpermissions.show', compact('roles'));
    }





   public function create_roles() { 
    $permissions = Permission::all();
    return view('RolesAndpermissions.create_roles' , compact( 'permissions') ) ;
   }
    

public function create(Request $request) {
     
   $validated = $request->validate([
        'role_name' => 'required|string',
        'permissions' => 'required|array',
        'permissions.*' => 'string|exists:permissions,name',
    ]);

    // Create the role once
    $role = Role::create([
        'name' => $validated['role_name']
       
    ]);

    // Assign selected permissions to that role
    foreach($request->permissions as $permissionName) {

        $permission = Permission::firstOrCreate(['name' => $permissionName]);
        $role->givePermissionTo($permission);
    }

      return redirect()->route('RolesAndpermissions.show')->with('success', 'Role created successfully.'); 

    }

          public function edit($id)
          {
              $role = Role::findById($id);
              $permissions = Permission::all();
              $rolePermissions = $role->permissions->pluck('id')->toArray();
          
              return view('RolesAndpermissions.edit', compact('role', 'permissions', 'rolePermissions'));
          }


          public function update(Request $request, $id)
          {
                $validated = $request->validate([
                    'role_name' => 'required|string',
                    'permissions' => 'required|array',
                    'permissions.*' => 'integer|exists:permissions,id',
                ]);
            
                $role = Role::findById($id);
                if (!$role) {
                    return redirect()->back()->with('error', 'Role not found.');
                }
            
                // Update role name
                $role->name = $validated['role_name'];
                $role->save();
            
                $permissionsIds = $validated['permissions'];

                $permissions = Permission::whereIn('id', $permissionsIds)
                         ->pluck('name')
                         ->toArray();

                $role->syncPermissions($permissions);

            
                return redirect()->route('RolesAndpermissions.show')->with('success', 'Role updated successfully.');



          }


          public function destroy_roles($id)
          {
              $role = Role::findById($id);
              if ($role) {
                  $role->delete();
                  return redirect()->back()->with('success', 'Role deleted successfully.');
              } else {
                  return redirect()->back()->with('error', 'Role not found.');
              }
          }

        
          public function destroy_permissions($id)
          {
            $permission = Permission::findById($id);
            if($permission){
                $permission->delete();
                return redirect()->back()->with('success', 'Permission deleted successfully.');
            
            }  else {
               return redirect()->back()->with('error', 'Permission not found.');
        }
    }

       

}




