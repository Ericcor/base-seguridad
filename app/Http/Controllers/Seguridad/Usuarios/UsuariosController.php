<?php
namespace App\Http\Controllers\Seguridad\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Seguridad\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Seguridad\PasswordChange;
use App\Models\Seguridad\AssignedRoles;
use App\Http\Requests\Seguridad\StoreUserRequest;
use App\Http\Requests\Seguridad\UpdateUserRequest;
use App\Http\Requests\Seguridad\ChangePasswordRequest;
class UsuariosController extends Controller
{

    public function usuariosActivos(Request $request){
        
        $order_by = orderBy($request, 'name');
        $users = User::where('status', 1)->orderBy($order_by->columna, $order_by->orden)->paginate(registros());
        $status='Activos';
        $users->appends($request->except('page'));
        return view('seguridad.usuarios.usuarios')
        ->with('users', $users)
        ->with('status', $status)
        ->with('order_by', $order_by);
    }

    public function usuariosInactivos(Request $request){
        $order_by = orderBy($request, 'name');
        $status='Inactivos';
        $users = User::where('status', 0)->orderBy($order_by->columna, $order_by->orden)->paginate(registros());
        $users->appends($request->except('page'));
        return view('seguridad.usuarios.usuarios')
        ->with('users', $users)
        ->with('status', $status)
        ->with('order_by', $order_by);
    }

    public function usuariosEliminados(Request $request){
        $order_by = orderBy($request, 'name');
        $status='Eliminados';
        $users = User::onlyTrashed()->orderBy($order_by->columna, $order_by->orden)->paginate(registros());
        $users->appends($request->except('page'));
        return view('seguridad.usuarios.usuarios')
        ->with('users', $users)
        ->with('status', $status)
        ->with('order_by', $order_by);
    }

    public function create(){

        $roles=Role::get();
        return view('seguridad.usuarios.crear')
        ->with('roles', $roles);
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try{
            $usuario = new user ();
            $usuario->name = $request->get('name');
            $usuario->email = $request->get('email');
            $usuario->password =  Hash::make($request->get('password'));
            $usuario->confirmation_code = md5(uniqid(mt_rand(), true));
            $usuario->last_login=Carbon::now();
            $usuario->confirmed=1;
            $usuario->remember_token= str_random(60);
            if ($request->get('status')==null){
                $usuario->status = 0;
            } else {
                $usuario->status = 1;
            }
            $usuario->save();
            $change_p = new PasswordChange ();
            $change_p->user_id =  $usuario->id;
            $change_p->password = bcrypt($request->get('password'));
            $change_p->save();

            foreach ($request->get('assignees_roles') as $rol) {
                $assignees_roles= new AssignedRoles ;
                $assignees_roles->user_id = $usuario->id;
                $assignees_roles->role_id = $rol;
                $assignees_roles->save();
            }
            DB::commit();
            alert()->success('!','Usuario creado satisfactoriamente');
            if ($usuario->status == 1){
                return redirect()->route('Seguridad.Usuarios.Activos');
            }
            else{
                return redirect()->route('Seguridad.Usuarios.Inactivos');
            }

        }catch (\Exception $e) {
            alert()->error('!','El usuario no pudo ser creado');
            return redirect()->route('Seguridad.Usuarios.Activos');
        }
    }

    public function edit (Request $request, $status,$id){
        $roles=Role::get();
        $user = user::FindOrFail($id);
        $user_roles [] = [];
        foreach ($user->roles as $rol) {
            $user_roles [] = $rol->id;
        }

        return view('seguridad.usuarios.editar')
        ->with('user_roles', $user_roles)
        ->with('roles', $roles)
        ->with('user', $user);
    }

    public function update(UpdateUserRequest $request, $user){
        DB::beginTransaction();
        try{
        $assigned_roles= AssignedRoles::where('user_id',$user )->get();
        foreach ($assigned_roles as $assigned_role) {
            $assigned_roles_d=AssignedRoles::FindOrFail($assigned_role->id);
            $assigned_roles_d->delete();
        }

        $usuario = user::FindOrFail($user);
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
            if ($request->get('status')==null){
            $usuario->status = 0;
            } else {
                $usuario->status = 1;
            }
            $usuario->save();

            if (count($request->get('assignees_roles'))>0){
                foreach ($request->get('assignees_roles') as $rol) {
                    $assignees_roles_a= new AssignedRoles ;
                    $assignees_roles_a->user_id = $usuario->id;
                    $assignees_roles_a->role_id = $rol;
                    $assignees_roles_a->save();
                }
            }
            DB::commit();
            alert()->success('!','Usuario actualizado correctamente');
            if ($usuario->status == 1){
                return redirect()->route('Seguridad.Usuarios.Activos');
            }
            else{
                return redirect()->route('Seguridad.Usuarios.Inactivos');
            }

        }catch (\Exception $e) {
            alert()->error('!','Usuario no pudo ser  Actualizado');
            return redirect()->route('Seguridad.Usuarios.Activos');
        }
    }

    public function destroy(Request $request, $id){
        $user = user::FindOrFail($id);
        $result = $user->delete();
            if ($result) {
                return response()->json(['success'=>'true']);
            }else{
                return response()->json(['success'=> 'false']);
            }
    }

    public function desactivate(Request $request, $id){
        $usuario = user::FindOrFail($id);
        $usuario->status = 0;
        $result = $usuario->save();
        if ($result) {
            return response()->json(['success'=>'true']);
        }else{
            return response()->json(['success'=> 'false']);
        }
    }

    public function change_Password(Request $request,$status,$id){
        $user = user::FindOrFail($id);
        return view('seguridad.usuarios.cambiarcontrasena')
        ->with('user', $user);
    }

    public function update_Password (ChangePasswordRequest $request, $id){

        $usuario = user::FindOrFail($id);
        $usuario->password =Hash::make($request->get('password'));
        $usuario->save();

        alert()->success('!','Contraseña actualizada satisfactoriamente');
        return redirect()->route('Seguridad.Usuarios.Activos');
    }
       
    public function activate(Request $request, $id){
        $usuario = user::FindOrFail($id);
        $usuario->status = 1;
        $result = $usuario->save();
        if ($result) {
          return response()->json(['success'=>'true']);
        }else{
          return response()->json(['success'=> 'false']);
        }
    }

    public function restaurar (Request $request, $id){
        $usuario = user::where('id', $id)-> withTrashed() ->first();
        $result = $usuario->restore();
        if ($result) {
          return response()->json(['success'=>'true']);
        }else{
          return response()->json(['success'=> 'false']);
        }
    }

}

