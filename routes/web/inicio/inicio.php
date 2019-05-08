<?php

// Controllers Within The "App\Http\Controllers\Inicio" Namespace
Route::namespace('Inicio')->group(function () {
  Route::get('/Inicio', 'InicioController@index')->name('inicio');
  Route::get('Inicio/Productos/json', 'InicioController@productosjson');
  Route::get('Inicio/HoraDB', 'InicioController@fechadb');
});
