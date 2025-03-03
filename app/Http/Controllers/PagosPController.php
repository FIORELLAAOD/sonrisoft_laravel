<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pagos;
use App\Cita;
use App\Models\User;
use App\Tratamiento;
use App\Medico;


class PagosPController extends Controller
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
        $cit=Cita::Buscar($request->Tratamientos)->orderBy('id','DESC')->where('IdPaciente',Auth::user()->id)->paginate(10);
        return view('paciente.pagos.index',['viewCitas'=>$cit]);
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
        $dtDato=new Pagos();
        $dtDato->IdCita=$request->IdCita;
        $dtDato->Monto=$request->Monto;
        $dtDato->IdUsuario=Auth::user()->id;
        $dtDato->save();
        $dtCita=Cita::find($request->IdCita);
        $dtCita->Pagado=$dtCita->Pagado + $request->Monto;
        $dtCita->Saldo=$dtCita->Costo - $dtCita->Pagado;
        if ($dtCita->Pagado==$dtCita->Costo) {
            $dtCita->Estadopago='Aplicado';
        }
        $dtCita->save();

        return redirect()->route('pagosp.show',$request->IdCita);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dtDato=Cita::find($id);
        $dtPaciente=User::find($dtDato->IdPaciente);
        $dtTratamiento=Tratamiento::find($dtDato->IdTratamientos);
        $dtMedico=Medico::find($dtDato->IdMedico);
        return view('paciente.pagos.detalle',['viewDatos'=>$dtDato,'viewPaciente'=>$dtPaciente,'viewTratemiento'=>$dtTratamiento,'viewMedico'=>$dtMedico]);
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
