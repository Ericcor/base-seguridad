<?php

namespace App\Http\Controllers\Seguridad\Reportes\Usuarios;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Config;
use SPDF;

class ListadoUsuariosController extends Controller
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
       // dd('aqi');
        $usuarios = User::withTrashed()
        ->orderBy('id', 'ASC')
        ->paginate(10);

        $activos = User::where('status', 1)
        ->count();

        $inactivos = User::where('status', 0)
        ->count();

        $eliminados = User::onlyTrashed()
        ->count();

        return view('seguridad.reportes.usuarios.usuarios')
        ->with('usuarios', $usuarios)
        ->with('activos', $activos)
        ->with('inactivos', $inactivos)
        ->with('eliminados', $eliminados);
    }


    public function reporteUsuarios($tipoReporte) {
        //constantes
        $usuarios = User::withTrashed()
        ->orderBy('id', 'ASC')
        ->get();

        $fecha_actual_slh = Carbon::now()->format('d/m/Y H:i:s a'); //fecha DD/MM/YYYY
        $fecha_actual_flg = Carbon::now()->format('YmdHis'); //fecha YYYYMMDDHHMMSS

        $param = array(
        'fecha_actual' => $fecha_actual_slh,
        'usuarios' =>$usuarios
    );

        //tiempo limite para generacion de reporte
        set_time_limit(120);

        //toma en cuenta el tipo de reporte seleccionado
    switch ($tipoReporte) {
    case 'PDF': //construcción PDF
            $headerHtml = \View::make('seguridad.reportes.usuarios.pd_pdfheader', $param)
        ->render();
        //$footerHtml = view()->make('pdf.footer')->render();
        $pdf = SPDF::loadView('seguridad.reportes.usuarios.pd_pdfbody', $param)
        ->setOption('header-html', $headerHtml)
        ->setOption('margin-top', '40mm')
        ->setTemporaryFolder($this->temporary_folder);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('SeguridadReportesUsuarios'.$fecha_actual_flg.'.'.$this->extension->pdf);

    break;
    case 'XLS': //construccion excel
                Excel::create("SeguridadReportesUsuarios", function ($excel) use ($usuarios) {
            $excel->setTitle("SeguridadReportesUsuarios");
            $excel->sheet("Usuarios", function ($sheet) use ($usuarios) {
                $sheet->loadView('seguridad.reportes.usuarios.ex_excel')->with('usuarios', $usuarios);
            });
        })->download($this->extension->excel);

            return back();

            break;
    default:
    break;
    }

    }

}
