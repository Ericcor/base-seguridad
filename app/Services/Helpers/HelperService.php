<?php

namespace App\Services\Helpers;

use Carbon\Carbon;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Config;

class HelperService
{


  //Paginador
  //$array, $request, $selPage = pagina seleccionada para mostrar
  public function arrayPaginator($array, $request, $selPage)
  {
    $page = $selPage;
    //se toma el valor constante del archivo para la cantidad de registros para la tabla, por cada pagina
    $perPage = Config::get('constants.tablas.caract_cantidad_registros');
    $offset = ($page * $perPage) - $perPage;
    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
    ['path' => $request->url(), 'query' => $request->query()]);
  }

  //ordenamiento de un array
  //$array, $columna = nombre de la propiedad por la cual se va a ordenar, $orden = ASC o DESC
  public function ordenarArregloPorColumna($array, $columna, $orden)
  {
    if(count($array) > 1){
      array_multisort(array_column($array, $columna), strtoupper($orden) == 'ASC' || strtoupper($orden) == null ? SORT_ASC : SORT_DESC, $array);
    }
    return $array;
  }

  public function identificarOrdenamiento($request, $defaultCol, $defaultOrd)
  {
    if ($request->has('order_by')) {
      $array = explode('-', $request->get('order_by'));
    }

    $columna = $array[0] ?? $defaultCol;
    $orden = $array[1] ?? strtoupper($defaultOrd);

    return (object) [
      'columna' => $columna,
      'orden' => $orden,
    ];
  }

  public function cantidadRegistrosPaginacion()
  {
    return Config::get('constants.tablas.caract_cantidad_registros');
  }
}
