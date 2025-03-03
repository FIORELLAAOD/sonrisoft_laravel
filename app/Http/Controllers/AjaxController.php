<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tratamiento;
use App\Cita;
use App\Models\User;
use App\Medico;
use Illuminate\Support\Facades\Auth;
use DateTime;

class AjaxController extends Controller 
{
    public function cargarCosto(Request $request)
    {
    	if ($request->ajax()) {
    		$idTratamiento=$request->get('tratamiento');
    		$dtTratamiento=Tratamiento::find($idTratamiento);
    		$vCosto=$dtTratamiento->Precio;
    		$data=array('costo' =>$vCosto);
    		echo json_encode($data);
    	}
    }

    public function buscarPaciente(Request $request)
    {
        if ($request->ajax()) {
            $vNombres='';
            $idPaciente=$request->get('paciente');
            $dtPaciente=User::find($idPaciente);
            $vNombres=mb_strtoupper($dtPaciente->name);
            $data=array('nombres' =>$vNombres);
            echo json_encode($data);
        }
    }

    public function validarDocumento(Request $request)
    {
        if ($request->ajax()) {

            $numero=$request->get('numero');
            $correo=$request->get('correo');

            $aux_docu='No';
            $aux_email='No';
            $dtBuscar=User::where('NumDoc',$numero)->count('id');
            if ($dtBuscar>0) { $aux_docu='Si'; }

            $dt_email=User::where('email',$correo)->count('id');
            if ($dt_email>0) { $aux_email='Si'; }

            $data=array('docu' =>$aux_docu,'correo'=>$aux_email);
            echo json_encode($data);
        }
    }

    public function validarDni(Request $request)
    {
        if ($request->ajax()) {
            $numero=$request->get('numero');
            $existe='No';
            $dtBuscar=Medico::where('DNI',$numero)->count('id');
            if ($dtBuscar>0) {
               $existe='Si';
            }else{
                $existe='No';
            }
            $data=array('datos' =>$existe);
            echo json_encode($data);
        }
    }


    public function cargarCalendario(Request $request)
    {
        
        $lista = [];
        if ($request->ajax()) {
            $dtCitas=Cita::get();
            foreach ($dtCitas as $cita) {
                $dtPaciente=User::find($cita->IdPaciente);
                $vNombres=mb_strtoupper($dtPaciente->name);
                $dtTratamiento=Tratamiento::find($cita->IdTratamientos);
                if ($cita->Estadocita=='Asignado') { $color='#C92417'; }
                if ($cita->Estadocita=='Atendido') { $color='#539B0A'; }
                array_push($lista,[
                    'paciente'=>$vNombres,
                    'tratamiento'=>$dtTratamiento->Tratamientos,
                    'enfermedad'=>$cita->Enfermedad,
                    'fecha'=>$cita->Fecha.' '.$cita->Hora,
                    'color'=>$color
                ]);
            }
            $data=array('datos' =>$lista);
            echo json_encode($data);
        }
    }


    public function buscarDni(Request $request)
    {
        $obj_user='';
        if ($request->ajax()) {
            $dni=$request->get('dni');
            $dt_u=User::where('NumDoc',$dni)->get();
            if ($dt_u->count()>0) {
                $obj_user=$dt_u;
            }
            $data=array('datos' =>$obj_user);
            echo json_encode($data);
        }
    }



    public function registrarse(Request $request)
    {
        if (Auth::check()) {
             return redirect("/login");
        }else{
            return view('registro');
        }
    }


    public function validarRegistro(Request $request)
    {
        if ($request->ajax()) {

            $pacienteId=$request->get('idpaciente');
            $fecha=$request->get('fecha');
            $hora=$request->get('hora');
            $dtBuscar=Cita::where('IdPaciente',$pacienteId)->where('Fecha',$fecha)->orderby('id','DESC')->first();
            $rango=0;

            if (isset($dtBuscar)) {
                $fr =new DateTime($fecha.' '.$hora.':00');
                $fs =new DateTime($dtBuscar->Fecha.' '.$dtBuscar->Hora);

                if ($fs > $fr) {
                    $fecha1 =$fr;
                    $fecha2 =$fs;
                    $intervalo = $fecha1->diff($fecha2);
                    $rango=$intervalo->format('%H');
                }elseif ($fs < $fr) {
                    $fecha1 =$fs;
                    $fecha2 =$fr;
                    $intervalo = $fecha1->diff($fecha2);
                    $rango=$intervalo->format('%H');
                }elseif ($dtBuscar->Hora == $hora) {
                    $rango=0;
                }
            }else{
                $rango=100; 
            }

            $data=array('rango' =>($rango*1));
            echo json_encode($data);
        }
    }

}
