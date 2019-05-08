<?php

namespace App\Http\Controllers\Seguridad\Contrasena\Complejidad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use  App\Models\Seguridad\PasswordRequirements;


class ContrasenaController extends Controller
{
	public function getIndex(Request $request){
    $order_by = orderBy($request, 'cod_requirement');
    $requerimientos = PasswordRequirements::orderBy($order_by->columna, $order_by->orden)->paginate(registros());

    $requerimientos_regex = PasswordRequirements::where('regex', 1)->get()->count();
    $requerimientos_regex_activos = PasswordRequirements::where('regex', 1)->where('status', 1)->get()->count();
    $requerimientos_regex_inactivos = PasswordRequirements::where('regex', 1)->where('status', 0)->get()->count();
    $activas = 0;
    $inactivas = 0;
      if ($requerimientos_regex == $requerimientos_regex_activos){ 
              $activas = 1;
      }
      if ($requerimientos_regex == $requerimientos_regex_inactivos){ 
              $inactivas = 1;
      }
	

      return view('seguridad.contrasena.complejidad.se_co_01_i_complejidad')
      ->with('requerimientos',$requerimientos)
      ->with('activas',$activas)
      ->with('inactivas',$inactivas)
      ->with('order_by', $order_by);
     }
    
    public function edit (Request $request,$id){

      $requerimiento = PasswordRequirements::FindOrFail($id);
      return view('seguridad.contrasena.complejidad.se_co_01_i_editar_complejidad')
      ->with('requerimiento',$requerimiento);

    }

    public function update (Request $request,$id){

      $requerimiento = PasswordRequirements::FindOrFail($id);
      $requerimiento->name = $request->get('name');
      if ($request->get('value') != null){
            $requerimiento->value = $request->get('value');
      }
        
      $requerimiento->status = $request->get('status');
      $requerimiento->description = $request->get('description');
      $requerimiento->message = $request->get('message');
      $requerimiento->save();
      alert()->success('!','Compleijidad actualizada exitosamente');
      return redirect()->route('Seguridad.Contrasena.Complejidad');
           
    }

    public function update_Multiple (Request $request){
        
      $requerimientos = PasswordRequirements::where('regex', 1)->get(); 
        
      foreach ($requerimientos as  $registros ) {
        $requerimiento = PasswordRequirements::FindOrFail($registros->id);
        $requerimiento->status = $request->get('status');
        $requerimiento->save();
      }

      alert()->success('!','Compleijidad actualizada exitosamente');
      return redirect()->route('Seguridad.Contrasena.Complejidad');

    }
}
