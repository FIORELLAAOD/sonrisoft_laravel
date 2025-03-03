<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hcita;
use DB;
use Illuminate\Support\Facades\Auth;

class HcitaPController extends Controller
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
        $cit=Hcita::Buscar($request->Tratamientos)->orderBy('id','DESC')->where('IdPaciente',Auth::user()->id)->paginate(10);
        return view('paciente.hcitas.index',['viewCit'=>$cit]);
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
        $cit = new Hcita();
        $cit->IdTratamientos=$request->IdTratamientos;
        $cit->IdMedico=$request->IdMedico;
        $cit->IdPaciente=$request->IdPaciente;
        $cit->Fecha=$request->Fecha;
        $cit->Hora=$request->Hora;
        $cit->Enfermedad=$request->Enfermedad;
        $cit->Estadocita=$request->Estadocita;
        $cit->Estadopago=$request->Estadopago;
        $cit->Costo=$request->Costo;
        $cit->save();
        return redirect()->route('hcitasp.index');
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
        $cit=Hcita::find($id);
        $cit->IdTratamientos=$request->IdTratamientos;
        $cit->IdMedico=$request->IdMedico;
        $cit->IdPaciente=$request->IdPaciente;
        $cit->Fecha=$request->Fecha;
        $cit->Hora=$request->Hora;
        $cit->Enfermedad=$request->Enfermedad;
        $cit->Estadocita=$request->Estadocita;
        $cit->Estadopago=$request->Estadopago;
        $cit->Costo=$request->Costo;
        $cit->save();
        return redirect()->route('hcitasp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cit=Hcita::find($id);
        $cit->delete();
        return redirect()->route('hcitasp.index');
    }
}
