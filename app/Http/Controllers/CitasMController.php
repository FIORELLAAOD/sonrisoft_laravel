<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Tratamiento;
use App\Models\User;
use App\Pagos;
use DB;

class CitasMController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cit=Cita::Buscar($request->Enfermedad)->orderBy('id','DESC')->where('IdMedico',Auth::user()->IdMedico)->paginate(10);
        return view('medico.citas.index',['viewCit'=>$cit]);
    }

    public function calendario(Request $request)
    {
        $lista = [];
        $dtCitas=Cita::where('IdMedico',Auth::user()->IdMedico)->get();
        foreach ($dtCitas as $cita) {
            $dtPaciente=User::find($cita->IdPaciente);
            $vNombres=mb_strtoupper($dtPaciente->name);
            $dtMedico=Medico::find($cita->IdMedico);
            $vMedico=$dtMedico->Apellidos.' '.$dtMedico->Nombres;
            $dtTratamiento=Tratamiento::find($cita->IdTratamientos);
            
            // colore de fondo en el calendario
            if ($cita->Estadocita=='Asignado') { $color='#C92417'; }
            if ($cita->Estadocita=='Atendido') { $color='#539B0A'; }
            array_push($lista,[
                'paciente'=>$vNombres,
                'medico'=>$vMedico,
                'tratamiento'=>$dtTratamiento->Tratamientos,
                'enfermedad'=>$cita->Enfermedad,
                'fecha'=>$cita->Fecha.' '.$cita->Hora,
                'color'=>$color
            ]);
        }
        return view('medico.citas.calendario',['vLista'=>$lista]);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
