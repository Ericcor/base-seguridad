<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    |
    | Listado con descripcion de los permisos que estan en base de datos table PERMISSIONS
    | si se anaden nuevos permisos seguir con la lista si se modifican
    | estar pendiente de la formula para llamarlo ( 'nombre' => 'valor' )
    | 
    | ********** MODIFICAR SOLO EL VALOR ***************
    |
    | {{ config('nombre del archivo en config +.+nombre del permiso') }}   
    |
    | ****** USO ******
    | {{ config('permissions.10-01-XX-01') }}   
    |
    |
    */

    //nombre => valor

    /* seguridad */
        'v_SegUserActivos' => '35-01-01-01', //ver usuarios activos
        'c_SegUser' => '35-01-01-02', //Crear usuarios
        'm_SegUser' => '35-01-01-03', //Modificar usuarios
        'e_SegUser' => '35-01-01-04', //Eliminar usuarios
        'v_SegUserInactivos' => '35-01-02-01', //Ver usuarios inactivos
        'v_SegUserEliminados' => '35-01-03-01', //Ver usuarios eliminados

        'v_SegRol' => '35-02-01-01', //Ver roles registrados
        'c_SegRol' => '35-02-01-02', //Crear rol
        'm_SegRol' => '35-02-01-03', //modificar rol
        'e_SegRol' => '35-02-01-04', //Eliminar rol

        'v_SegReport' => '35-03-01-01', //Ver reportes listado
        'v_SegPass' => '35-04-01-01', //Ver complejidad de la  contrasena
        'm_SegPass' => '35-04-01-03'  //Modificar complejidad de la contrasena


    /* fin seguridad */

];
