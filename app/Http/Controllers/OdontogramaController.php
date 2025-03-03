<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Odontograma;


class OdontogramaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','roles:Administrador']); 
    }


    public function index(Request $request)
    {
    	$existe='no';
    	if (isset($request->paciente)) {
    		$dt_user=User::where('NumDoc',$request->paciente)->where('Rol','Paciente')->count('id');
    		$dt_u='';
    		if ($dt_user>0) { 
    			$existe='si';
    			$dt_u=User::where('NumDoc',$request->paciente)->first();
    		}
    		return view('odontograma',['id_existe'=>$existe,'dt_paciente'=>$dt_u,'paciente'=>$request->paciente]);
    	}else{
    		return view('odontograma',['id_existe'=>$existe,'paciente'=>$request->paciente]); 
    	}	
    }


    function store(Request $request){


        $dt_existe=Odontograma::where('fecha',date('Y-m-d'))
        ->where('id_paciente',$request->id_paciente)
        ->where('num_diente',$request->num_diente)
        ->where('lado',$request->lado)->count('id');


        if ($dt_existe>0) {
        Odontograma::where('fecha',date('Y-m-d'))
        ->where('id_paciente',$request->id_paciente)
        ->where('num_diente',$request->num_diente)
        ->where('lado',$request->lado)->delete(); 
        }

        $dt=new Odontograma();
        $dt->fecha=date('Y-m-d');
        $dt->id_paciente=$request->id_paciente;
        $dt->num_diente=$request->num_diente;
        $dt->lado=$request->lado;
        $dt->accion=$request->accion!='' ? $request->accion : '';
        $dt->simbolo=$request->simbolo!='' ? $request->simbolo : '';
        $dt->id_tratamiento=$request->id_tratamiento!='' ? $request->id_tratamiento : '0';
        $dt->descripcion=$request->descripcion!='' ? $request->descripcion : '';
        $dt->id_usuario=Auth::user()->id;
        $dt->save();
 

        $usu=User::find($request->id_paciente);

    	return redirect()->route('odontograma','paciente='.$usu->NumDoc);
    }







}
