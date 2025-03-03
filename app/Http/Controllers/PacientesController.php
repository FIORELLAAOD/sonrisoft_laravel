<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\Historial;
use Illuminate\Support\Facades\Hash;


class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','roles:Administrador']);
    }

    public function index(Request $request)
    {
        $user=Pacientes::Buscar($request->name)
        ->where('Rol','Paciente')
        ->orderBy('name','ASC')->paginate(10);
        return view('admin.pacientes.index',['viewUsers'=>$user]);
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
        if ($request->id_tbl=='') {
            $user=new Pacientes();
        }else{
            $user=Pacientes::find($request->id_tbl);
        }
        
        $user->TipoDoc=$request->TipoDoc;
        $user->NumDoc=$request->NumDoc;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->Telefono=$request->Telefono;
        if ($request->id_tbl=='') {
            $user->password=Hash::make($request->NumDoc);
            $user->Rol='Paciente';
            $user->Foto='Default.png';
            $user->Estado=1;
            $user->IdMedico=0;
        }
        $user->save();

        $id_pa=$user->id; 
        

        if ($request->id_h=='') {
            $dt=new Historial();
        }else{
            $dt=Historial::find($request->id_h);
        }

        $dt->id_paciente=$id_pa;
        $dt->trata_medic=$request->trata_medic;
        $dt->propen_hemo=$request->propen_hemo;
        $dt->alergico=$request->alergico;
        $dt->hipertenso=$request->hipertenso;
        $dt->diabetico=$request->diabetico;
        $dt->embarazada=$request->embarazada;
        $dt->motivo_consul=$request->motivo_consul;
        $dt->diagnostico=$request->diagnostico!='' ? $request->diagnostico : '';
        $dt->observacion=$request->observacion!='' ? $request->observacion : '';
        $dt->referido=$request->referido!='' ? $request->referido : '';
        $dt->save();


        return redirect()->route('pacientes.index');
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
        $pacientes=Pacientes::find($id);
        $pacientes->delete();
        return redirect()->back();
        //
    }
}
