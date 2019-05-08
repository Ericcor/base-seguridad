<?php
Route::middleware(['monitoreo'])->group(function () {

    /* horarios */
        Route::get('Monitoreo/Horarios','Monitoreo\Horarios\HorariosController@index');
        Route::get('Monitoreo/Horarios/json','Monitoreo\Horarios\HorariosController@json');
    /* fin horarios */

    /* Estado de Participantes */

        /* General*/
        Route::get('Monitoreo/EstadoParticipantes/General', 'Monitoreo\EstadoParticipantes\General\GeneralController@index');
        Route::get('Monitoreo/EstadoParticipantes/General/json', 'Monitoreo\EstadoParticipantes\General\GeneralController@json');
        /* fin general*/

        /* Detallado */
        Route::get('Monitoreo/EstadoParticipantes/Detallado', 'Monitoreo\EstadoParticipantes\Detallado\DetalladoController@index');
        Route::get('Monitoreo/EstadoParticipantes/Detallado/tabla', 'Monitoreo\EstadoParticipantes\Detallado\DetalladoController@ajax');
        /* fin detallado */

    /* Fin Estado de Participantes */
});