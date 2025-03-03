<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tratamiento;
use DB;


class TratamientoController extends Controller
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
        $trata=Tratamiento::Buscar($request->Tratamientos)->orderBy('Tratamientos','ASC')->paginate(10);
        return view('admin.tratamientos.index',['viewTrata'=>$trata]);
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

    public function borrarTratamientos(Request $request)
    {
        $lista=json_decode($request->ListaBorrar);
        foreach ($lista as $dato) {
        $stEspe=Tratamiento::find($dato->id);
        $stEspe->delete();
        }
        return redirect()->route('tratamientos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trata = new Tratamiento();
        $trata ->Tratamientos=$request->Tratamientos;
        $trata ->Precio=$request->Precio;
        $trata ->save();
        return redirect()->route('tratamientos.index');
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
       $trata=Tratamiento::find($id);
        return view('admin.tratamientos.edit',['viewTrata'=>$trata]);
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
        $trata=Tratamiento::find($id);
        $trata->Tratamientos=$request->Tratamientos;
        $trata->Precio=$request->Precio;
        $trata->save();
        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trata=Tratamiento::find($id);
        $trata->delete();
        return redirect()->route('tratamientos.index');
    }
}
