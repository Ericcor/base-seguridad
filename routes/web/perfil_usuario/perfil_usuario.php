<?php
Route::get('PerfilUsuario/MiPerfil', 'PerfilUsuario\PerfilUsuarioController@index')->name('PerfilUsuario.index');
Route::get('PerfilUsuario/MiPerfil/CambiarContrasena/{id}', 'PerfilUsuario\PerfilUsuarioController@change_Paswword')->name('PerfilUsuario.changePasword');
Route::post('PerfilUsuario/ActualizarContrasena/{id}', 'PerfilUsuario\PerfilUsuarioController@update_Pasword')->name('PerfilUsuario.updatePasword');
Route::get('PerfilUsuario/MiPerfil/CambiarLogotipo/{id}', 'PerfilUsuario\PerfilUsuarioController@change_Image')->name('PerfilUsuario.changeImage');
Route::post('PerfilUsuario/ActualizarImagen/{id}', 'PerfilUsuario\PerfilUsuarioController@update_Image')->name('PerfilUsuario.updateImage');

