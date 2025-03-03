<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pagos;
use App\Cita;
use App\Models\User;
use App\Tratamiento;
use App\Medico;


class PagosMController extends Controller
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
        $cit=Cita::Buscar($request->Tratamientos)->orderBy('id','DESC')->where('IdMedico',Auth::user()->IdMedico)->paginate(10);
        return view('medico.pagos.index',['viewCitas'=>$cit]);
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
        $dtDato=Cita::find($id);
        $dtPaciente=User::find($dtDato->IdPaciente);
        $dtTratamiento=Tratamiento::find($dtDato->IdTratamientos);
        $dtMedico=Medico::find($dtDato->IdMedico);
        return view('medico.pagos.detalle',['viewDatos'=>$dtDato,'viewPaciente'=>$dtPaciente,'viewTratemiento'=>$dtTratamiento,'viewMedico'=>$dtMedico]);
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
