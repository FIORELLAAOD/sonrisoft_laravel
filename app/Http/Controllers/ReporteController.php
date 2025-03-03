<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Cita;
use App\Medico;
use DB;
use PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reportes.index');
    }

    public function pacientes(Request $request)
    {
        $tipo='';
        $idPaciente=$request->Paciente;
        $inicio=$request->Inicio;
        $fin=$request->Fin;
        if ($fin!='' && $inicio!='') {
           $aFechas= array('f1'=>$inicio,'f2'=>$fin,'pacien'=>$idPaciente);
        }else{
            $aFechas= array('f1'=>"0",'f2'=>"0",'pacien'=>$idPaciente);
        }
        

        if ($request->Paciente=='') {
           $dtDatos=User::Buscar('')->where('Rol','Paciente')->paginate(10);
           $tipo='Todos';
        }else{
            $dtDatos=User::BuscarId($request->Paciente)->where('Rol','Paciente')->paginate(10);
            $tipo='Individual';
            $idPaciente=$request->Paciente;
        }
        $dtPacientes=DB::table('users')->where('Rol','Paciente')->orderBy('name','ASC')->pluck('name','id');
        return view('admin.reportes.rptpacientes',['viewDatos'=>$dtDatos,'vTipo'=>$tipo,'vPaciente'=>$idPaciente,'vPacientes'=>$dtPacientes,'vInicio'=>$inicio,'vFin'=>$fin,'arrFechas'=>$aFechas]);
    }


    public function pacientestodo(Request $request,$datos)
    {
        $inicio=$datos;
        $fin=$request->f2;

        $dtDatos=User::where('Rol','Paciente')->orderBy('name','ASC')->get();
       $pdf=PDF::loadview('admin.reportes.pacientespdf',['viewDatos'=>$dtDatos,'vInicio'=>$inicio,'vFin'=>$fin])->setPaper('a4','landscape'); // contenido
       return $pdf->stream('ReportePacientes'.'.pdf'); // nombre del archivo
    }
    public function rptpacienteindiv(Request $request,$datos)
    {
        $inicio=$datos;
        $fin=$request->f2;

        $dtPaciente=User::find($request->pacien);
       $pdf=PDF::loadview('admin.reportes.pacientesindivpdf',['vInicio'=>$inicio,'vFin'=>$fin,'vPaciente'=>$dtPaciente])->setPaper('a4','landscape'); // contenido
       return $pdf->stream('ReportePacientes'.'.pdf'); // nombre del archivo
    }

    
    public function rptcitas()
    {
        $dtCit_Enero=Cita::whereMonth('Fecha','01')->count('id');
        $dtCit_Febrero=Cita::whereMonth('Fecha','02')->count('id');
        $dtCit_Marzo=Cita::whereMonth('Fecha','03')->count('id');
        $dtCit_Abril=Cita::whereMonth('Fecha','04')->count('id');
        $dtCit_Mayo=Cita::whereMonth('Fecha','05')->count('id');
        $dtCit_Junio=Cita::whereMonth('Fecha','06')->count('id');
        $dtCit_Julio=Cita::whereMonth('Fecha','07')->count('id');
        $dtCit_Agosto=Cita::whereMonth('Fecha','08')->count('id');
        $dtCit_Setiembre=Cita::whereMonth('Fecha','09')->count('id');
        $dtCit_Octubre=Cita::whereMonth('Fecha','10')->count('id');
        $dtCit_Noviembre=Cita::whereMonth('Fecha','11')->count('id');
        $dtCit_Diciembre=Cita::whereMonth('Fecha','12')->count('id');
        $totalCitas=$dtCit_Enero + $dtCit_Febrero + $dtCit_Marzo + $dtCit_Abril + $dtCit_Mayo + $dtCit_Junio + $dtCit_Julio + $dtCit_Agosto + $dtCit_Setiembre + $dtCit_Octubre + $dtCit_Noviembre + $dtCit_Diciembre;
        return view('rptcitas',[
            'cEnero'=>$dtCit_Enero,
            'cFebrero'=>$dtCit_Febrero,
            'cMarzo'=>$dtCit_Marzo,
            'cAbril'=>$dtCit_Abril,
            'cMayo'=>$dtCit_Mayo,
            'cJunio'=>$dtCit_Junio,
            'cJulio'=>$dtCit_Julio,
            'cAgosto'=>$dtCit_Agosto,
            'cSetiembre'=>$dtCit_Setiembre,
            'cOctubre'=>$dtCit_Octubre,
            'cNoviembre'=>$dtCit_Noviembre,
            'cDiciembre'=>$dtCit_Diciembre,
            'totCitas'=>$totalCitas,
        ]);
    }


    public function rpttendencia(){
        $dtCit_Enero=Cita::whereMonth('Fecha','01')->count('id');
        $dtCit_Febrero=Cita::whereMonth('Fecha','02')->count('id');
        $dtCit_Marzo=Cita::whereMonth('Fecha','03')->count('id');
        $dtCit_Abril=Cita::whereMonth('Fecha','04')->count('id');
        $dtCit_Mayo=Cita::whereMonth('Fecha','05')->count('id');
        $dtCit_Junio=Cita::whereMonth('Fecha','06')->count('id');
        $dtCit_Julio=Cita::whereMonth('Fecha','07')->count('id');
        $dtCit_Agosto=Cita::whereMonth('Fecha','08')->count('id');
        $dtCit_Setiembre=Cita::whereMonth('Fecha','09')->count('id');
        $dtCit_Octubre=Cita::whereMonth('Fecha','10')->count('id');
        $dtCit_Noviembre=Cita::whereMonth('Fecha','11')->count('id');
        $dtCit_Diciembre=Cita::whereMonth('Fecha','12')->count('id');
        $totalCitas=$dtCit_Enero + $dtCit_Febrero + $dtCit_Marzo + $dtCit_Abril + $dtCit_Mayo + $dtCit_Junio + $dtCit_Julio + $dtCit_Agosto + $dtCit_Setiembre + $dtCit_Octubre + $dtCit_Noviembre + $dtCit_Diciembre;
        return view('rpttendencia',[
            'cEnero'=>$dtCit_Enero,
            'cFebrero'=>$dtCit_Febrero,
            'cMarzo'=>$dtCit_Marzo,
            'cAbril'=>$dtCit_Abril,
            'cMayo'=>$dtCit_Mayo,
            'cJunio'=>$dtCit_Junio,
            'cJulio'=>$dtCit_Julio,
            'cAgosto'=>$dtCit_Agosto,
            'cSetiembre'=>$dtCit_Setiembre,
            'cOctubre'=>$dtCit_Octubre,
            'cNoviembre'=>$dtCit_Noviembre,
            'cDiciembre'=>$dtCit_Diciembre,
            'totCitas'=>$totalCitas,
        ]);

    }


    public function rpt_odontograma(Request $request)
    {
        $dtPaciente=User::find($request->paciente);
        $pdf=PDF::loadview('admin.reportes.odontograma',['dt_paciente'=>$dtPaciente])->setPaper('a4','vertical');
        return $pdf->stream('Odontograma_'.$dtPaciente->id.'.pdf');
    }


   public function rpt_medicos(Request $request)
    {
        $dt=Medico::orderby('Nombres','ASC')->get();
        $pdf=PDF::loadview('reportes.medicos',['dt_p'=>$dt])->setPaper('a4','vertical');
        return $pdf->stream('report_medicos'.'.pdf');
    }


   public function rpt_pacientes(Request $request)
    {
        $dt=User::where('Rol','Paciente')->orderby('name','ASC')->get();
        $pdf=PDF::loadview('reportes.pacientes',['dt_p'=>$dt])->setPaper('a4','vertical');
        return $pdf->stream('report_pacientes'.'.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
