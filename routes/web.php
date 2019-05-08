<?php

/*Route::group(['middleware' => 'web'], function() {
  Route::group(['namespace' => 'Frontend'], function () {
    require (__DIR__ . '/Routes/Frontend/Access.php');
  });
});*/
Auth::routes();


Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');



Route::group(['middleware' => ['admin']], function() {

  /* INICIO */
  require (__DIR__ . '/web/inicio/inicio.php');
  /* FIN INICIO */


  /* MONITOREO */
  require (__DIR__ . '/web/monitoreo/monitoreo.php');
  /* FIN MONITOREO */



 /* MENSAJES */
    require (__DIR__ . '/web/mensajes_informativos/mensajes_informativos.php');
  /* FIN MENSAJES */



  /* IMAGENES */
    require (__DIR__ . '/web/imagenes/imagenes.php');
  /* FIN IMAGENES */


  /* SEGURIDAD */
    require (__DIR__ . '/web/seguridad/seguridad.php');
  /* FIN SEGURIDAD */


  /* PERFIL DE USUARIO */
    require (__DIR__ . '/web/perfil_usuario/perfil_usuario.php');
  /* FIN PERFIL DE USUARIOS */

  /* ROUTE ERROR */
  Route::get('500', function() {abort(500);});
  /* FIN ROUTE ERROR */
});
