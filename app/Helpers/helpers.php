<?php
setlocale(LC_ALL, 'es');

if(!function_exists('routeIs')) {
    function routeIs($url, $class = 'menu-open')
    {
        if (is_array($url)) {
            foreach ($url as $url) {
    	       if (Request::is($url))
                return $class;
            }
            return '';
        }
        return Request::is($url) ? $class : '';
    }
}

if(!function_exists('paginate')) {
    function paginate($array, $request, $selPage)
    {
        return (new \App\Services\Helpers\HelperService())->arrayPaginator($array, $request, $selPage);
    }
}

if(!function_exists('ordenar')) {
    function ordenar($array, $columna, $orden)
    {
        return (new \App\Services\Helpers\HelperService())->ordenarArregloPorColumna($array, $columna, $orden);
    }
if(!function_exists('orderBy')) {
    function orderBy($request, $defaultCol='id', $defaultOrd='asc')
    {
        return (new \App\Services\Helpers\HelperService())->identificarOrdenamiento($request, $defaultCol, $defaultOrd);
    }
}
if(!function_exists('registros')) {
    function registros()
    {
        return (new \App\Services\Helpers\HelperService())->cantidadRegistrosPaginacion();
    }
}
}
