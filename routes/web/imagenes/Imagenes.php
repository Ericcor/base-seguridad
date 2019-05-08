<?php
Route::middleware(['imagenes'])->group(function () {

  /*
   * IMAGENES
   */

  /* Conciliacion */
    Route::get('Imagenes/Conciliacion', 'Imagenes\Conciliacion\ConciliacionController@Index');

    Route::get('Imagenes/Conciliacion/tabla', 'Imagenes\Conciliacion\ConciliacionController@ajax');
    /* Fin conciliacion */
});
