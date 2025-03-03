<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tratamiento;
use App\Cita;
use App\Models\User;
use App\Models\Configuracion;
use App\Medico;
use App\Odontograma;
use DateTime;
use Date;

class FuncionesController extends Controller 
{
    public function color_lado($id_paciente,$num_diente,$lado,$fecha)
    {
        $color='';
        $lado=Odontograma::where('id_paciente',$id_paciente)->where('num_diente',$num_diente)->where('lado',$lado)->where('fecha',$fecha)->first();
        if ($lado!='') {
            if ($lado->accion!='') {
                $dt_a=Configuracion::find($lado->accion);
                $color='background-color:'.$dt_a->color;
            }else{
               $color=''; 
            }
           
        }else{
            $color='';
        }
        return $color; 
    }


    public function simbolo_diente($id_paciente,$num_diente,$fecha)
    {
        $dato='';
        $lado=Odontograma::where('id_paciente',$id_paciente)->where('num_diente',$num_diente)->where('lado','Centro')->where('fecha',$fecha)->first();
        if ($lado!='') {
            if ($lado->simbolo!='') {
                
                $dato=$lado->simbolo;
            }else{
               $dato=''; 
            }
           
        }else{
            $dato='';
        }
        return $dato; 
    }

}
