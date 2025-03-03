    <?php 
    if ($id_existe=='si') {
        $color=$funciones->color_lado($dt_paciente->id,$i,'Izquierdo',$fecha);
    }else{ $color=''; }
    ?>
    <button style="height: 25px;padding: 5px;{{ $color }}" class="btn_diente" @if($id_existe=='si') data-toggle="modal" data-target="#mdl_registro" onclick="registrar({{ $dt_paciente->id }},{{ $i }},'Izquierdo')" @endif>
    </button>

    <?php 
    if ($id_existe=='si') {
        $color=$funciones->color_lado($dt_paciente->id,$i,'Centro',$fecha);
    }else{ $color=''; }
    ?>

    <button style="width: 35px;height: 23px;padding: 8px;{{ $color }}" class="btn_diente" @if($id_existe=='si') data-toggle="modal" data-target="#mdl_registro" onclick="registrar({{ $dt_paciente->id }},{{ $i }},'Centro')" @endif>
    </button>

    <?php 
    if ($id_existe=='si') {
        $color=$funciones->color_lado($dt_paciente->id,$i,'Derecho',$fecha);
    }else{ $color=''; }
    ?>

    <button style="height: 25px;padding: 5px;{{ $color }}" class="btn_diente" @if($id_existe=='si') data-toggle="modal" data-target="#mdl_registro" onclick="registrar({{ $dt_paciente->id }},{{ $i }},'Derecho')" @endif>
    </button>