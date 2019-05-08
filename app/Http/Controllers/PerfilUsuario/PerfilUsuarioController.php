<?php

namespace App\Http\Controllers\PerfilUsuario;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PerfilUsuario\ChangePasswordPerfilURequest;

class PerfilUsuarioController extends Controller
{
    public function index(){
        $user =Auth::user() ;
        return view('perfil_u.perfil')
        ->with('user', $user);

    }
    public function change_Paswword(Request $Request, $id){
                $user = user::FindOrFail($id);
                return view('perfil_u.cambiarcontrasena')
                        ->with('user', $user);

    }
    public function update_Pasword (ChangePasswordPerfilURequest $request, $id){
        $usuario = user::FindOrFail($id);

        $data = $request->all();
     
        $user = User::find(auth()->user()->id);
        if(!Hash::check($data['old_password'], $user->password)){
           return redirect()->back()->withErrors('La contraseña actual no coincide');
        }else{
            $usuario->password =Hash::make($request->get('password'));
            $usuario->save();
            alert()->success('Contraseña actualizada satisfactoriamente');
            return redirect()->route('PerfilUsuario.index');
        }
       
    }
    public function change_Image($id){
        $user = User::findOrFail($id);
        return view('perfil_u.cambiar_image')
        ->with('user', $user);
    }
    public function update_Image(Request $request, $id){
        $user = User::findOrFail($id);
        /* Obtenemos una instancia del disco virtual */
        $disco = Storage::disk('avatars');
        /* Obtenemos los datos de la imágen */
        $imagen_nombre = sha1($user->id).'.'.$request->file('logotipo')->getClientOriginalExtension();
        $imagen_contenido = file_get_contents($request->file('logotipo')->getRealPath());
        /* Eliminamos la imagen anterior en caso de existir */
        if ($disco->exists($imagen_nombre)) {
            $disco->delete($imagen_nombre);
        }
        $guardar = $disco->put($imagen_nombre, $imagen_contenido);
        if ($guardar == true) {
            $user->logotipo = $imagen_nombre;
            $user->save();
        }
        alert()->success('Imagen actualizada satisfactoriamente');
        return redirect()->route('PerfilUsuario.index');
    }

}
