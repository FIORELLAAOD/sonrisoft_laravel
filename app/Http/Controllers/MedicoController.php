<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medico;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use PDF;
use App\Models\User;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','roles:Administrador']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $med=Medico::Buscar($request->Nombres)->orderBy('Nombres','ASC')->paginate(10);
        return view('admin.medicos.index',['viewMed'=>$med]);
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
    public function imprimirHistorial($id)
    {
       $dtMedico=Medico::find($id);
       $pdf=PDF::loadview('rptmedico',['viewMed'=>$dtMedico])->setPaper('a4','vertical'); // contenido
       return $pdf->stream('Medico_'.$dtMedico->NumDoc.'_'.$dtMedico->Nombres.'.pdf'); // nombre del archivo
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $med = new Medico();
        $med->Nombres=$request->Nombres;
        $med->Apellidos=$request->Apellidos;
        $med->DNI=$request->DNI;
        $med->IdEspecialidad=$request->IdEspecialidad;
        $med->Direccion=$request->Direccion;
        $med->Email=$request->Email;
        $med->Telefono=$request->Telefono;
        $med->save();


        $user=new User();
        $user->TipoDoc='DNI';
        $user->NumDoc=$request->DNI;
        $user->name=$request->Nombres.' '.$request->Apellidos;
        $user->email=$request->Email;
        $user->password=Hash::make($request->DNI);
        $user->Rol='Medico';
        $user->Estado=1;
        $user->Foto='Default.png';
        $user->Telefono=$request->Telefono;
        $user->IdMedico=$med->id;
        $user->save();

        return redirect()->route('medicos.index');
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
        
        $espes=DB::table('especialidad')->pluck('Descripcion','id');
        $med=Medico::find($id);
        return view('admin.medicos.edit',['viewMed'=>$med,'viewEspe'=>$espes]);
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
        $med=Medico::find($id);
        $med->Nombres=$request->Nombres;
        $med->Apellidos=$request->Apellidos;
        $med->DNI=$request->DNI;
        $med->IdEspecialidad=$request->IdEspecialidad;
        $med->Direccion=$request->Direccion;
        $med->Email=$request->Email;
        $med->Telefono=$request->Telefono;
        $med->save();

        $dtBuscar=User::where('IdMedico',$med->id)->count('id');
        if ($dtBuscar==0) {
            $user=new User();
            $user->TipoDoc='DNI';
            $user->NumDoc=$request->DNI;
            $user->name=$request->Nombres.' '.$request->Apellidos;
            $user->email=$request->Email;
            $user->password=Hash::make($request->DNI);
            $user->Rol='Medico';
            $user->Estado=1;
            $user->Foto='Default.png';
            $user->Telefono=$request->Telefono;
            $user->IdMedico=$med->id;
            $user->save();  
        }

        return redirect()->route('medicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $med=Medico::find($id);
        $med->delete();
        return redirect()->route('medicos.index');    
    }
}
