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

class CitasPController extends Controller
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
        $cit=Cita::Buscar($request->Enfermedad)->orderBy('id','DESC')->where('IdPaciente',Auth::user()->id)->paginate(10);
        return view('paciente.citas.index',['viewCit'=>$cit]);
    }

    public function calendario(Request $request)
    {
        $lista = [];
        $dtCitas=Cita::where('IdPaciente',Auth::user()->id)->get();
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
        return view('paciente.citas.calendario',['vLista'=>$lista]);
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
        $cit = new Cita();
        $cit->IdTratamientos=0;
        $cit->IdMedico=$request->IdMedico;
        $cit->IdPaciente=$request->IdPaciente;
        $cit->Fecha=$request->Fecha;
        $cit->Hora=$request->Hora;
        $cit->Enfermedad=$request->Enfermedad;
        $cit->Estadocita='Asignado';
        $cit->Costo=$request->Costo;
        $cit->Pagado=$request->Pagado;
        $cit->Saldo=$request->Costo - $request->Pagado;
        if ($request->Pagado< $request->Costo) {
            $cit->Estadopago='Pendiente';
        }elseif($request->Pagado==$request->Costo){
            $cit->Estadopago='Aplicado';
        }
        $cit->save();

        $dtPago=new Pagos();
        $dtPago->IdCita=$cit->id;
        $dtPago->Monto=$request->Pagado;
        $dtPago->IdUsuario=Auth::user()->id;
        $dtPago->save();

        return redirect()->route('citasp.index');
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
        $dtTratamientos=Tratamiento::select(DB::raw("CONCAT('s/. ',Precio,' - ',Tratamientos) AS Dato"),'id')->pluck('Dato','id');
        $dtMedicos=Medico::select(DB::raw("CONCAT(Nombres,' ',Apellidos) AS Dato"),'id')->pluck('Dato','id');

        $dtPacientes=DB::table('users')->where('Rol','Paciente')->orderBy('name','ASC')->pluck('name','id');
        $dtCitas=Cita::find($id);
        return view('admin.citas.edit',['viewCitas'=>$dtCitas,'viewTratamientos'=>$dtTratamientos,'viewMedicos'=>$dtMedicos,'viewPacientes'=>$dtPacientes]);
        
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
        $cit=Cita::find($id);
        $cit->IdTratamientos=$request->IdTratamientos;
        $cit->IdMedico=$request->IdMedico;
        $cit->IdPaciente=$request->IdPaciente;
        //$cit->Fecha=$request->Fecha;
        //$cit->Hora=$request->Hora;
        $cit->Enfermedad=$request->Enfermedad;
        $cit->Estadocita=$request->Estadocita;
        $cit->Estadopago=$request->Estadopago;
        $cit->Costo=$request->Costo;
        $cit->save();
        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cit=Cita::find($id);
        $cit->delete();
        return redirect()->route('citas.index');
    }
}
