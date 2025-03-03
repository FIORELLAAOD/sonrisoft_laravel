<?php 

if ($id_existe=='si') {
    $color=$funciones->color_lado($dt_paciente->id,$i,'Abajo',$fecha);
}else{ $color=''; }
?>
<button style="width: 27px;height: 10px;{{ $color }}" class="btn_diente" @if($id_existe=='si') data-toggle="modal" data-target="#mdl_registro" onclick="registrar({{ $dt_paciente->id }},{{ $i }},'Abajo')" @endif>
</button> 