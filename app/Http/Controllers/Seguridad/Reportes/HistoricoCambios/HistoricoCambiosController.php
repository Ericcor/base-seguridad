<?php

namespace App\Http\Controllers\Seguridad\Reportes\HistoricoCambios;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Config;
use SPDF;

class HistoricoCambiosController extends Controller
{
    protected $extension;

    protected $temporary_folder;

    public function __construct()
    {
            $this->extension = Config::get('constants.reportes.caract_extension');

            $this->temporary_folder = Config::get('constants.reportes.carac_temporary_folder');
    }
    public function index()
    {

        $logs = DB::table('audits')
        ->where('url', 'NOT LIKE', '%login')
        ->where('url', 'NOT LIKE', '%logout')
        ->where('old_values', 'NOT LIKE', '%remember_token')
        ->where('new_values', 'NOT LIKE', '%remember_token')
        ->leftJoin('users', 'users.id', '=', 'audits.user_id')
        ->select('audits.*', 'users.name as username', 'users.email as user_email')
        ->orderBy('audits.id', 'DESC')
        ->paginate(15);

        for($x = 0; $x < count($logs); $x++) {

            /** Cambiamos el evento por su contraparte en español */
            if($logs[$x]->event == 'created') {
                $logs[$x]->event = 'Creación';
            } elseif($logs[$x]->event == 'updated') {
                $logs[$x]->event = 'Actualización';
            } elseif($logs[$x]->event == 'deleted') {
                $logs[$x]->event = 'Eliminación';
            } elseif($logs[$x]->event == 'restored') {
                $logs[$x]->event = 'Restauración';
            }
        }
        //dd($logs);

        return view('seguridad.reportes.historico_cambios.historicocambios')
        ->with('logs', $logs);
    }

    public function show($id)
    {

        $log = DB::table('audits')
        ->where('audits.id', $id)
        ->leftJoin('users', 'users.id', '=', 'audits.user_id')
        ->select('audits.*', 'users.name as username', 'users.email as user_email')
        ->first();

        /** Cambiamos el evento por su contraparte en español */
        if($log->event == 'created') {
            $log->event = 'Creación';
        } elseif($log->event == 'updated') {
            $log->event = 'Actualización';
        } elseif($log->event == 'deleted') {
            $log->event = 'Eliminación';
        } elseif($log->event == 'restored') {
            $log->event = 'Restauración';
        }

        //dd(!empty($log->old_values));

        return view('seguridad.reportes.historico_cambios.detalles')
        ->with('log', $log);
    }
    public function reporteHistoricoCambios($tipoReporte) {
        //constantes
       $logs = DB::table('audits')
        ->where('url', 'NOT LIKE', '%login')
        ->where('url', 'NOT LIKE', '%logout')
        ->where('old_values', 'NOT LIKE', '%remember_token')
        ->where('new_values', 'NOT LIKE', '%remember_token')
        ->leftJoin('users', 'users.id', '=', 'audits.user_id')
        ->select('audits.*', 'users.name as username', 'users.email as user_email')
        ->orderBy('audits.id', 'DESC')
        ->get();

        for($x = 0; $x < count($logs); $x++) {
            /* Cambiamos el evento por su contraparte en español */
            if($logs[$x]->event == 'created') {
                $logs[$x]->event = 'Creación';
            } elseif($logs[$x]->event == 'updated') {
                $logs[$x]->event = 'Actualización';
            } elseif($logs[$x]->event == 'deleted') {
                $logs[$x]->event = 'Eliminación';
            } elseif($logs[$x]->event == 'restored') {
                $logs[$x]->event = 'Restauración';
            }
        }


        $fecha_actual_slh = Carbon::now()->format('d/m/Y H:i:s a'); //fecha DD/MM/YYYY
        $fecha_actual_flg = Carbon::now()->format('YmdHis'); //fecha YYYYMMDDHHMMSS

        $param = array(
        'fecha_actual' => $fecha_actual_slh,
        'logs' =>$logs
    );

        //tiempo limite para generacion de reporte
        set_time_limit(120);

        //toma en cuenta el tipo de reporte seleccionado
    switch ($tipoReporte) {
    case 'PDF': //construcción PDF
        $headerHtml = \View::make('seguridad.reportes.historico_cambios.pd_pdfheader', $param)
        ->render();
        //$footerHtml = view()->make('pdf.footer')->render();
        $pdf = SPDF::loadView('seguridad.reportes.historico_cambios.pd_pdfbody', $param)
            ->setOption('header-html', $headerHtml)
            ->setOption('margin-top', '40mm')
            ->setTemporaryFolder($this->temporary_folder);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('SeguridadReportesHistoricoCambios'.$fecha_actual_flg.'.'.$this->extension->pdf);

    break;
    case 'XLS': //construccion excel
        Excel::create("SeguridadReportesHistoricoCambios", function ($excel) use ($logs) {
            $excel->setTitle("ReporteHistoricoCambios");
            $excel->sheet("Cambios", function ($sheet) use ($logs) {
                $sheet->loadView('seguridad.reportes.historico_cambios.excel')->with('logs', $logs);
            });
        })->download($this->extension->excel);

        return back();

        break;
        default:
    break;
    }

    }
}
