<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','roles:Administrador']);
    }
    
    
    public function index(Request $request)
    {
        $user=User::Buscar($request->name)->where('Rol','Administrador')->orderBy('name','ASC')->paginate(10);
        return view('admin.users.index',['viewUsers'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }


    public function imprimirHistorial($id)
    {
       $dtPaciente=User::find($id);
       $pdf=PDF::loadview('rptpaciente',['viewPaciente'=>$dtPaciente])->setPaper('a4','vertical'); // contenido
       return $pdf->stream('Paciente_'.$dtPaciente->NumDoc.'_'.$dtPaciente->name.'.pdf'); // nombre del archivo
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$userv=user::find($request->email);
        $user=new User($request->all());
        $user->password=Hash::make($request->password);
        $user->Rol=$request->Rol;
        $user->Foto='Default.png';
        $user->Estado=1;
        $user->IdMedico=0;
        $user->save();
        return redirect()->route('users.index');
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
        $user=user::find($id);
        return view('admin.users.edit',['viewUsers'=>$user]);
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
        $user=user::find($id);
        $user->name=$request->name;
        $user->TipoDoc=$request->TipoDoc;
        $user->NumDoc=$request->NumDoc;
        $user->Rol=$request->Rol;
        $user->Telefono=$request->Telefono;
        $user->email=$request->email;
        if ($request->password!='') {
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=user::find($id); // buscas
        $user->delete(); // eliminas
        return redirect()->route('users.index'); // volver a la lista
    }
}
