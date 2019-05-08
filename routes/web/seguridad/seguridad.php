<?php

Route::middleware(['seguridad'])->group(function () {

    Route::get('Seguridad/Usuarios/Activos', 'Seguridad\Usuarios\UsuariosController@usuariosActivos')->name('Seguridad.Usuarios.Activos');
    Route::get('Seguridad/Usuarios/Inactivos', 'Seguridad\Usuarios\UsuariosController@usuariosInactivos')->name('Seguridad.Usuarios.Inactivos');
    Route::get('Seguridad/Usuarios/Eliminados', 'Seguridad\Usuarios\UsuariosController@usuariosEliminados')->name('Seguridad.Usuarios.Eliminados');
    Route::get('Seguridad/Usuarios/Activos/Crear', 'Seguridad\Usuarios\UsuariosController@create')->name('Seguridad.Usuarios.create');
    Route::post('Seguridad/Usuarios/Crear/Usuario', 'Seguridad\Usuarios\UsuariosController@store')->name('Seguridad.Usuarios.store');
    Route::get('Seguridad/Usuarios/{status}/Edit/{id}', 'Seguridad\Usuarios\UsuariosController@edit')->name('Seguridad.Usuarios.edit');
    Route::post('Seguridad/Usuarios/Actualizar/{id}', 'Seguridad\Usuarios\UsuariosController@update')->name('Seguridad.Usuarios.update');
    Route::get('Seguridad/Usuarios/Borrar/{id}', 'Seguridad\Usuarios\UsuariosController@destroy')->name('Seguridad.Usuarios.destroy');
    Route::get('Seguridad/Usuarios/Desactivar/{id}', 'Seguridad\Usuarios\UsuariosController@desactivate')->name('Seguridad.Usuarios.desactivate');
    Route::get('Seguridad/Usuarios/Activate/{id}', 'Seguridad\Usuarios\UsuariosController@activate')->name('Seguridad.Usuarios.activate');
    Route::get('Seguridad/Usuarios/Restaurar/{id}', 'Seguridad\Usuarios\UsuariosController@restaurar')->name('Seguridad.Usuarios.restaurar');
    Route::get('Seguridad/Usuarios/{status}/CambiarContrasena/{id}', 'Seguridad\Usuarios\UsuariosController@change_Password')->name('Seguridad.Usuarios.ChangePassword');
    Route::post('Seguridad/Usuarios/ActualizarContrasena/{id}', 'Seguridad\Usuarios\UsuariosController@update_Password')->name('Seguridad.Usuarios.UpdatePassword');


    Route::resource('Seguridad/RolesRegistrados', 'Seguridad\Roles\RoleController');
    Route::get('Seguridad/RolesRegistrados/Borrar/{id}', 'Seguridad\Roles\RoleController@destroy')->name('Seguridad.RolesRegistrados.destroy');
    Route::get('Seguridad/RolesRegistrados/Clonar/{id}', 'Seguridad\Roles\RoleController@create_Clon')->name('Seguridad.RolesRegistrados.createclon');
    Route::patch('Seguridad/RolesRegistrados/Clonar/Store/{id}', 'Seguridad\Roles\RoleController@store_Clon')->name('Seguridad.RolesRegistrados.updateclon');

    Route::group(['middleware' => ['hasPermissionsTo:'.config('permissions.v_SegReport')]], function () {
        Route::get('Seguridad/Reportes','Seguridad\Reportes\ListadoController@Listado');
        Route::get('Seguridad/Reportes/Listado/Reporte/{tipoReporte}','Seguridad\Reportes\ListadoController@reporteListado');

        Route::get('Seguridad/Reportes/Usuarios', 'Seguridad\Reportes\Usuarios\ListadoUsuariosController@index');
        Route::get('Seguridad/Reportes/Listado/Usuarios/Reporte/{tipoReporte}','Seguridad\Reportes\Usuarios\ListadoUsuariosController@reporteUsuarios');

        Route::get('Seguridad/Reportes/Roles', 'Seguridad\Reportes\Roles\ListadoRolesController@index');
        Route::get('Seguridad/Reportes/Listado/Roles/Reporte/{tipoReporte}','Seguridad\Reportes\Roles\ListadoRolesController@reporteRoles');

        Route::get('Seguridad/Reportes/ControlAcceso', 'Seguridad\Reportes\ControlAcceso\ControlAccesoController@index');
        Route::get('Seguridad/Reportes/Listado/ControlAcceso/Reporte/{tipoReporte}','Seguridad\Reportes\ControlAcceso\ControlAccesoController@reporteAcceso');

        Route::get('Seguridad/Reportes/HistoricoCambios', 'Seguridad\Reportes\HistoricoCambios\HistoricoCambiosController@index');
        Route::get('Seguridad/Reportes/HistoricoCambios/detalles/{id}', 'Seguridad\Reportes\HistoricoCambios\HistoricoCambiosController@show')->name('Seguridad.Reportes.HistoricodeCambios.show');
        Route::get('Seguridad/Reportes/Listado/HistoricoCambios/Reporte/{tipoReporte}','Seguridad\Reportes\HistoricoCambios\HistoricoCambiosController@reporteHistoricoCambios');
    });

        Route::get('Seguridad/Contrasena/Complejidad', 'Seguridad\Contrasena\Complejidad\ContrasenaController@getIndex')->name('Seguridad.Contrasena.Complejidad');
        Route::get('Seguridad/Contrasena/Complejidad/edit/{id}', 'Seguridad\Contrasena\Complejidad\ContrasenaController@edit')->name('Seguridad.Contrasena.Complejidad.edit');
        Route::post('Seguridad/Contrasena/Complejidad/Actualizar/{id}', 'Seguridad\Contrasena\Complejidad\ContrasenaController@update')->name('Seguridad.Contrasena.Complejidad.update');
        Route::post('Seguridad/Contrasena/Complejidad/ActualizarMultiple', 'Seguridad\Contrasena\Complejidad\ContrasenaController@update_Multiple')->name('Seguridad.Contrasena.Complejidad.update_Multiple');

});
