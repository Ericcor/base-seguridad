<?php

Route::middleware(['mensajes_informativos'])->group(function () {
    /* INICIO  MENSAJES.NUEVO MENSAJE */

    Route::resource('MensajesInformativos/CCE/NuevoMensaje', 'MensajesInformativos\CCE\NuevoMensaje\NuevoMensajeController');
    /* FIN COBRANZA MENSAJES.NUEVO MENSAJE */


    /* INICIO  MENSAJES. MENSAJEs RECIBIDOS */

    Route::get('MensajesInformativos/CCE/Recibidos', 'MensajesInformativos\CCE\Recibidos\MensajesRecibidosController@getIndex')->name('mensajesrecibidos');
    Route::get('MensajesInformativos/CCE/Recibidos/json', 'MensajesInformativos\CCE\Recibidos\MensajesRecibidosController@getIndexjson')->name('mensajesrecibidosJson');
    Route::get('MensajesInformativos/CCE/Recibidos/{id}', 'MensajesInformativos\CCE\Recibidos\MensajesRecibidosController@show')->name('mensajesrecibidosdetalle');

    /* FIN COBRANZA MENSAJES.MENSAJEs RECIBIDOS  */


    /* INICIO  MENSAJES. MENSAJEs ENVIADOS */

    Route::get('MensajesInformativos/CCE/Enviados', 'MensajesInformativos\CCE\Enviados\MensajesEnviadosController@getIndex')->name('mensajesenviados');
    Route::get('MensajesInformativos/CCE/Enviados/{id}', 'MensajesInformativos\CCE\Enviados\MensajesEnviadosController@show')->name('mensajesenviadosdetalle');

    /* FIN COBRANZA MENSAJES.MENSAJEs ENVIADOS */



    /* INICIO  MENSAJES. MENSAJEs IBP MONITOREO */

    Route::get('MensajesInformativos/Participante/Monitoreo', 'MensajesInformativos\Participantes\Monitoreo\MonitoreoMensajesController@getIndex')->name('monitoreo.mensajes.participante');

    /* FIN  MENSAJES. MENSAJEs IBP MONITOREO */
});