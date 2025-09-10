<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use  Spatie\Permission\Models\Permission;
use  App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RolesAndPermissionController extends Controller
{
    public function addPermissons(Request $request) {
       
        $permissions = [
            'access dashboard',
            'users management',
            'register',

        ];
        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }


    }

    public function show(){
        $roles = role::all();
        return view('RolesAndpermissions.show', compact('roles'));
    }





   public function create_roles() { 
    $users = User::all();
    $permissions = Permission::all();
    return view('RolesAndpermissions.create_roles' , compact('users' , 'permissions') ) ;
   }
    


    public function create(Request $request) {

         $validated = $request->validate([
        'name' => 'required|string',
        'permission' => 'nullable|array',
        'user' => 'required|array',
    ]);

        $roles = Role::create(['name'=> $validated['name']]);

        

        foreach ($validated['permission'] ?? [] as $permission){

            $roles = Role::create(['name'=> $permission]);
            
            $roles->givePermissionTo($permission);
        }

        foreach ( $validated['user'] ?? [] as $userId){

            $user = User::find($userId);
            $user->assignRole($roles->name);
        }

         return redirect()->route('RolesAndpermissions.show')->with('success','add new permission');
    }

    
          public function edit($id)
          {
              $role = Role::findById($id);
              $permissions = Permission::all();
              $rolePermissions = $role->permissions->pluck('name')->toArray();
          
              return view('RolesAndpermissions.edit', compact('role', 'permissions', 'rolePermissions'));
          }


          public function update(Request $request, $id)
          {
              $role = Role::findById($id);
              $role->name = $request->name;
              $role->save();
          
              $role->syncPermissions($request->permissions);
          
              return redirect()->route('RolesAndpermissions.show')->with('success', 'Role updated successfully.');
          }


          public function destroy($id)
          {
              $role = Role::findById($id);
              if ($role) {
                  $role->delete();
                  return redirect()->route('RolesAndpermissions.show')->with('success', 'Role deleted successfully.');
              } else {
                  return redirect()->route('RolesAndpermissions.show')->with('error', 'Role not found.');
              }
          }

        

}




