<?php

namespace App\Http\Controllers\Seguridad\Roles;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Seguridad\Role;
use App\Models\Seguridad\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\Seguridad\PermissionRole;
use App\Http\Requests\Seguridad\StoreRoleRequest;
use App\Http\Requests\Seguridad\UpdateRoleRequest;

class RoleController extends Controller
{
    public function index(Request $request){
        $order_by = orderBy($request, 'name');
        $roles = Role::orderBy($order_by->columna, $order_by->orden)->paginate(registros());
        return view('seguridad.roles.roles')
        ->with('roles',$roles)
        ->with('order_by', $order_by);
    }
    public function create (Request $request, $id = null){

        $permissions = Permission::get();
        $roles = Role::get();
        return view('seguridad.roles.crear_roles')
          ->with('role_count', count($roles))
          ->with('permissions', $permissions->groupby('module'));
    }
    public function store (StoreRoleRequest $request){

        DB::beginTransaction();
        try{
        $role =  new Role ();
        $role->name = $request->get('name') ;
        $role->sort = $request->get('sort') ;
            if ($request->get('associated-permissions')=='all'){
                $role->todos = 1 ;
            }else{
                $role->todos = 0 ;
            }
            $role->save();
        if ($request->get('associated-permissions')!='all'){

            foreach ($request->get('permissions') as $permiso) {
                    $Permission_role= new PermissionRole();
                    $Permission_role ->permission_id = $permiso;
                    $Permission_role ->role_id = $role->id;
                    $Permission_role -> save();
            }
        }
            DB::commit();
            alert()->success('!','Rol creado satisfactoriamente');
            return redirect()->route('RolesRegistrados.index');
        }catch (\Exception $e) {
            alert()->error('!','El Rol no pudo ser creado');
            return redirect()->route('RolesRegistrados.index');
        }
    }
    public function edit (Request $request, $id){
        $Role = Role::FindOrFail($id);

        $permissions = Permission::get();
        $role_permissions[] = [];
        foreach ($Role->permissions as $permiso) {
                $role_permissions[]= $permiso->id;
        }


        return view('seguridad.roles.editar_rol')
        ->with('role',$Role)
        ->with('role_permissions',$role_permissions)
        ->with('permissions', $permissions->groupby('module'));

    }

    public  function update (UpdateRoleRequest $request, $id) {
        if ($request->get('associated-permissions') != 'all'){
            $permission_role= PermissionRole::where('role_id',$id)->get();
            foreach ($permission_role as $permission_rol) {
                $permission_rol_d=PermissionRole::FindOrFail($permission_rol->id);
                $permission_rol_d->delete();
            }
        }

        DB::beginTransaction();

        try{
        $role =Role::FindOrFail ($id);
        $role->name = $request->get('name') ;
            if ($request->get('associated-permissions')=='all'){
                $role->todos = 1 ;
            }else{
                $role->todos = 0 ;
            }
        $role->save();

        if ($request->get('associated-permissions')!='all'){
            foreach ($request->get('permissions') as $permiso) {
                    $Permission_role= new PermissionRole();
                    $Permission_role ->permission_id = $permiso;
                    $Permission_role ->role_id = $role->id;
                    $Permission_role -> save();
            }
        }

        DB::commit();

        alert()->success('!','Rol actualizado satisfactoriamente');
        return redirect()->route('RolesRegistrados.index');
        }catch (\Exception $e) {
        alert()->error('!','El Rol no pudo ser creado');
        return redirect()->route('RolesRegistrados.index');
        }
    }

    public function destroy(Request $request, $id){
            if ( count (Role::FindOrFail($id)->users) >0 ){
                return response()->json(['success'=> 'false']);
            } else {
               $permission_role= PermissionRole::where('role_id',$id)->get();
            foreach ($permission_role as $permission_rol) {
                $permission_rol_d=PermissionRole::FindOrFail($permission_rol->id);
                $permission_rol_d->delete();
            }
            $Role = Role::FindOrFail($id);
            $result = $Role->delete();

            if ($result){
                return response()->json(['success'=>'true']);
            }else{
                    return response()->json(['success'=> 'false']);
            }
        }
    }

    public function create_Clon(Request $request, $id){
        $Role = Role::FindOrFail($id);
        $permissions = Permission::get();
        $role_permissions[] = [];
            foreach ($Role->permissions as $permiso) {
                $role_permissions[]= $permiso->id;
            }
        return view('seguridad.roles.clonar_rol')
        ->with('role',$Role)
        ->with('role_permissions',$role_permissions)
        ->with('permissions', $permissions->groupby('module'));
    }

    public function store_Clon(UpdateRoleRequest $request, $id){
        DB::beginTransaction();
        try{
            $role =  new Role ();
            $role->name = $request->get('name') ;
            $role->sort = $request->get('sort') ;
                        if ($request->get('associated-permissions')=='all'){
                                $role->todos = 1 ;
                        }else {
                                $role->todos = 0 ;
                        }
            $role->save();

        if ($request->get('associated-permissions')!='all'){
            foreach ($request->get('permissions') as $permiso) {
                    $Permission_role= new PermissionRole();
                    $Permission_role ->permission_id = $permiso;
                    $Permission_role ->role_id = $role->id;
                    $Permission_role -> save();
            }
        }
        DB::commit();
        alert()->success('!','Rol clonado satisfactoriamente');
        return redirect()->route('RolesRegistrados.index');
        }catch (\Exception $e) {
            alert()->error('!','El rol no pudo ser clonado');
            return redirect()->route('RolesRegistrados.index');
        }
    }
}
