<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Models\Reportes\EscalaMontos;
use DateTime;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->validator->extendImplicit('fecha_diferencia', function ($attribute, $value, $parameters) {
          $param1 = \Carbon\Carbon::createFromFormat('Y-m-d', $parameters['0']);
          $param2 = \Carbon\Carbon::createFromFormat('Y-m-d', $parameters['1']);
          $param3 = intval($parameters['2']);
          return ($param2->diffInDays($param1)+1) <= $param3 ;
        }, 'El rango de fechas no puede tener una diferencia mayor a :campo días. !');
        $this->app->validator->replacer('fecha_diferencia', function ($message, $attribute, $rule, $parameters) {
          return str_replace(':campo', $parameters['2'], $message);
        });

        $this->app->validator->extendImplicit('no_cero', function ($attribute, $value, $parameters) {
          return $parameters['0'] != 0;
        }, 'El campo ":campo" es inválido. No puede ser cero tomando en cuenta los filtros seleccionados. !');
        $this->app->validator->replacer('no_cero', function ($message, $attribute, $rule, $parameters) {
          return str_replace(':campo', $parameters['1'], $message);
        });

        $this->app->validator->extendImplicit('periodo_mayor_que', function ($attribute, $value, $parameters) {
          return $parameters['1'] <= $parameters['0'];
        }, 'El primer período de fechas seleccionado debe ser posterior al segundo período !');

        $this->app->validator->extendImplicit('fecha_mayor_que', function ($attribute, $value, $parameters) {
          return $parameters['1'] >= $parameters['0'];
        }, 'El campo Fecha desde no puede ser mayor al campo Fecha hasta !');

        $this->app->validator->extendImplicit('mayor_que', function ($attribute, $value, $parameters) {
          return $parameters['0'] <= $parameters['1'];
        }, 'El campo Hora desde no puede ser mayor al campo Hora Hasta !');

        $this->app->validator->extendImplicit('monto_menor_cero', function ($attribute, $value, $parameters) {
          return $parameters[0] >= 0;
        }, 'El campo Monto desde no puede ser menor a cero !');

        $this->app->validator->extendImplicit('montos', function ($attribute, $value, $parameters) {
          $EscalaMontos = EscalaMontos::all();
          $ultimo       = $EscalaMontos->last();
          return $ultimo->mon_hasta >= $parameters[0];
        }, 'El campo Monto Hasta no puede ser mayor al definido en tabla Escala Montos!');

        $this->app->validator->extendImplicit('monto_mayor_que', function ($attribute, $value, $parameters) {
          return $parameters['0'] <= $parameters['1'];
        }, 'El campo monto desde no puede ser mayor al campo monto hasta !');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
