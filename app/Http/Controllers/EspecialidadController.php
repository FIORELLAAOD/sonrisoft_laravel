<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use DB;

class EspecialidadController extends Controller
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
        $dato=Especialidad::all();
        /*return view('admin.especialidades.index')->with('viewDatos',$dato);*/

        $dato=Especialidad::Buscar($request->Descripcion)->orderBy('Descripcion','ASC')->paginate(10);
        return view('admin.especialidades.index',['viewDatos'=>$dato]);
    }

    public function borrarLista(Request $request)
    {
        $lista=json_decode($request->ListaBorrar);
        foreach ($lista as $dato) {
        $stEspe=Especialidad::find($dato->id);
        $stEspe->delete();
        }
        return redirect()->route('especialidades.index');
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
        $dato=new Especialidad();
        $dato->Descripcion=$request->Descripcion;
        $dato->save();
        return redirect()->route('especialidades.index');
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
        $dato=Especialidad::find($id);
        return view('admin.especialidades.edit',['viewDatos'=>$dato]);
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
        $dato=Especialidad::find($id);
        $dato->Descripcion=$request->Descripcion;
        $dato->save();
        return redirect()->route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato=Especialidad::find($id);
        $dato->delete();
        return redirect()->route('especialidades.index');
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        Especialidad::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Category deleted successfully."]);   
    }
}
