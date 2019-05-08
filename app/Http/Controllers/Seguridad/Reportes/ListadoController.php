<?php

namespace App\Http\Controllers\Seguridad\Reportes;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Config;
use SPDF;

class ListadoController extends Controller
{
    public function Listado(){
        return view('seguridad.reportes.listado.listado');
    }

    public function reporteListado($tipoReporte) {
    //constantes
    $fecha_actual_slh = Carbon::now()->format('d/m/Y H:i:s a'); //fecha DD/MM/YYYY
    $fecha_actual_flg = Carbon::now()->format('YmdHis'); //fecha YYYYMMDDHHMMSS

    $param = array(
    'fecha_actual' => $fecha_actual_slh,
    );

    //tiempo limite para generacion de reporte
    set_time_limit(120);

    //toma en cuenta el tipo de reporte seleccionado
    
    switch ($tipoReporte) {
    case 'PDF': //construcción PDF
            $headerHtml = \View::make('seguridad.reportes.listado.pdfheader', $param)
        ->render();
        //$footerHtml = view()->make('pdf.footer')->render();
        $pdf = SPDF::loadView('seguridad.reportes.listado.pd_pdfbody', $param)
        ->setOption('header-html', $headerHtml)
        ->setOption('margin-top', '40mm')
        ->setTemporaryFolder($this->temporary_folder);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('ListadoReportesSeguridad'.$fecha_actual_flg.'.'.$this->extension->pdf);

    break;
    case 'XLS': //construccion excel
                Excel::create("ListadoReportesSeguridad".$fecha_actual_flg, function ($excel) use ($param) {
            $excel->setTitle("ListadoReportesSeguridad");
            $excel->sheet("ListadoReportesSeguridad", function ($sheet) use ($param) {
            $sheet->loadView('seguridad.reportes.listado.ex_excel')->with('param',$param);
            });
            })->download($this->extension->excel);

            return back();

            break;
    default:
    break;
    }

    }

}
