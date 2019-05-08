<?php

namespace App\Http\Controllers\Seguridad\Reportes\Roles;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Role;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Config;
use SPDF;
use Session;
use DB;

class ListadoRolesController extends Controller
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
        $roles = Role::orderBy('id', 'ASC')
        ->paginate(5);

        $roles2 = Role::orderBy('id', 'ASC')
        ->get();

        return view('seguridad.reportes.roles.roles')
        ->with('roles', $roles);
    }


    public function reporteRoles($tipoReporte) {
        //constantes
        $roles = Role::orderBy('id', 'ASC')
        ->get();

        $fecha_actual_slh = Carbon::now()->format('d/m/Y H:i:s a'); //fecha DD/MM/YYYY
        $fecha_actual_flg = Carbon::now()->format('YmdHis'); //fecha YYYYMMDDHHMMSS

        $param = array(
        'fecha_actual' => $fecha_actual_slh,
        'roles' =>$roles
    );

        //tiempo limite para generacion de reporte
        set_time_limit(120);

        //toma en cuenta el tipo de reporte seleccionado
    switch ($tipoReporte) {
    case 'PDF': //construcción PDF
            $headerHtml = \View::make('seguridad.reportes.roles.pd_pdfheader', $param)
        ->render();
        //$footerHtml = view()->make('pdf.footer')->render();
        $pdf = SPDF::loadView('seguridad.reportes.roles.pd_pdfbody', $param)
        ->setOption('header-html', $headerHtml)
        ->setOption('margin-top', '40mm')
        ->setTemporaryFolder($this->temporary_folder);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('SeguridadReportesRoles'.$fecha_actual_flg.'.'.$this->extension->pdf);

    break;
    case 'XLS': //construccion excel
            Excel::create("SeguridadReportesRoles", function ($excel) use ($roles) {
                $excel->setTitle("SeguridadReportesUsuarios");
                $excel->sheet("Roles", function ($sheet) use ($roles) {
                    $sheet->loadView('seguridad.reportes.roles.ex_excel')->with('roles', $roles);
                });
            })->download($this->extension->excel);

            return back();

            break;
    default:
    break;
    }

    }
}
