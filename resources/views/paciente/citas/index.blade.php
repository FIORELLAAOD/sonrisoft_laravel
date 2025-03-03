@inject('medicos','App\Medico')
@inject('pacientes','App\Models\User')
@inject('tratamientos','App\Tratamiento')
@inject('especialidades','App\Especialidad')
@extends('layouts.app')
@section('title','Todas los citas')
@section('content')

    <div class="row justify-content-center">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">


<div class="row">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" style="color: #009E60;"><i class="fa fa-calendar-plus-o"></i> Registrar nueva cita </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             {!! Form::open(['route'=>('citasp.store'),'method'=>'POST','files'=>true,'id'=>'frmcita']) !!}
<input type="hidden" name="saludo" value="hola">
        
<div class="row"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Medico</small>
            <select type="text" name="IdMedico" class="form-control"  value="" required="" > 
                <option value="">Seleccione...</option>
                @foreach($medicos::orderBy('Apellidos','ASC')->get() as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->Apellidos }} {{ $medico->Nombres }}</option>
                @endforeach
            </select>
            </div>         
        </div>

        <div class="row">
            <input type="hidden" name="IdPaciente" class="form-control"  value="{{ Auth::user()->id }}" >         
        </div>

            <?php 
                $fecha=date('Y-m-d');
                $hora=date('H:i');
            ?>
        <input type="hidden" id="horaactual" value="{{ $hora }}">
        <input type="hidden" id="fechaactual" value="{{ $fecha }}">
        <div class="row">
            <div class="col-6-12 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Fecha</small>
                <input type="date" name="Fecha" class="form-control"  value="" required="" min="{{ $fecha }}" id="fecha">  
            </div> 

            <div class="col-6-12 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Hora</small>
                <input type="time" name="Hora" class="form-control"  value="" required="" id="hora">  
            </div> 
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Enfermedad:</small>
            <input type="text" name="Enfermedad" class="form-control" style="text-transform: capitalize" value="" required="" placeholder="Enfermedad">   
            </div>         
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Costo</small>
            <input type="number" name="Costo" id="costo" class="form-control"  value="0" placeholder="Costo" readonly="">   
            </div> 
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Pagado</small>
            <input type="number" name="Pagado"  class="form-control"  placeholder="Pagado" min="0" step="0.10" max="10000" value="0" readonly="">   
            </div> 
        </div>
 
        <hr>
        <p style="color: #EA2323;display: none;" id="msjcita">
            Seleccione otro horario..!
        </p>

        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Guardar</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
      </div>
        </div>  
    </div>
</div>

            {!! Form::close() !!}
      </div>
    </div>
  </div>

</div>
</div>

<br>
<div class="row" >
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar-plus-o"></i> Nueva Cita</button>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'citasp.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('Enfermedad',null,['class'=>'form-control',
        'placeholder'=>'Buscar Citas...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('citasp.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
    </div>
    {!! Form::close() !!}
</div> 
                </div>
                <div class="card-body">            

<p style="text-align: center;color: #677C92;"> {{  $viewCit->total() }} CITAS EN TOTAL
   
</p>

<div class="row">
    
<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>#</th>
        <th>Paciente</th>
        <th>Tratamiento</th>
        <th>Medico</th>
        <th>Enfermedad</th>
        <th>Fecha</th>
        <th>Hora</th>
        <!--<th>Estado cita</th>-->
        <th>Costo</th>
        <th>Pagado</th>
        <th>Opciones</th>
    </thead> 
    <tbody>
        <?php $x=0; ?>
         @foreach($viewCit as $cit)
            <?php
                $x++;
            ?>
            <tr>
                <td>{{ $x }}</td>
                <td>
                @foreach($pacientes::where('id',$cit->IdPaciente)->get() as $paciente)
                    {{ $paciente->name }}
                @endforeach
                </td>                
                <td>
                    @foreach($tratamientos::where('id',$cit->IdTratamientos)->get() as $tratamiento)
                        {{ $tratamiento->Tratamientos }}
                    @endforeach
                </td>
                <td>
                    @foreach($medicos::where('id',$cit->IdMedico)->get() as $medico)
                        {{ $medico->Apellidos }} {{ $medico->Nombres }}
                    @endforeach
                </td>
                <td>{{ $cit->Enfermedad }}</td>
                <td>{{ $cit->Fecha }}</td>
                <td>{{ $cit->Hora }}</td>
                <!--<td>{{ $cit->Estadocita }}
                    <font color="green" style="font-weight: bold">ASIGNADO</font>
                </td>-->
                <td>s/.{{ $cit->Costo }}</td>
                <td>
                    @if($cit->Pagado==0)
                        <span style="color: #F01A1A;font-weight: bold;">s/.{{ $cit->Pagado }}</span>
                    @elseif($cit->Pagado >0 && $cit->Pagado < $cit->Costo)
                        <span style="color: #EFA10A;font-weight: bold;">s/.{{ $cit->Pagado }}</span>
                    @else
                    <span style="color: #05B411;font-weight: bold;">s/.{{ $cit->Pagado }}</span>
                    @endif
                </td>
                <td>
                    <!--
                    <a href="{{ route('citas.edit',$cit->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i> ...
                    </a>

                  <form style="display: inline;" method="POST" action="{{route('citas.destroy',$cit->id)}}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')" class="btn btn-danger btn-sm" >
                      <i class="fa fa-remove"></i> ...
                    </button>
                  </form>
                    -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!!$viewCit->render()!!}


</div>



   

<br>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$( document ).ready(function() {
var auxi=0;
$('#tratamiento').change(function(){
    var tratamientoid=$('#tratamiento').val();
    if (tratamientoid>0) {
        $.ajax({
            url:"{{ route('cargar.costo') }}",
            data:{tratamiento:tratamientoid},
            method:'GET',
            dataType:'json',
            success:function(data){
                if (data.costo!='') {
                    $('#costo').val(data.costo);
                }else{
                    $('#costo').val('');
                }
            }
        });
    }
});


function validarHora(){
    var fecha=$('#fecha').val();
    var hora_actual=$('#horaactual').val();
    var fecha_actual=$('#fechaactual').val();
    if (fecha!='') {
        if (fecha==fecha_actual) {
            $('#hora').prop('min',hora_actual);
        }else{
            $('#hora').prop('min','');
        }
    }
}

$('#fecha').change(function(){
    validarHora();
    ValidarDatos();
});




function ValidarDatos(){
  var idpaciente="{{ Auth::user()->id }}";
  var fecha=$('#fecha').val();
  var hora=$('#hora').val();
    if (idpaciente!='' && fecha!='' && hora!='') {
        $.ajax({
            url:"{{ route('validar.registro') }}",
             method:'GET',
            data:{idpaciente:idpaciente,fecha:fecha,hora:hora},
            dataType:'json',
            success:function(data){
              auxi=data.rango;  
            }
        });    
    }

}

 

$('#hora').on('change', function() { ValidarDatos(); });


$('#frmcita').submit(function(e){
    if (auxi>=1) {
        return true
    }else{
        $('#msjcita').show();
        $('#msjcita').delay(4000).hide(600);
        return false;
    }
});

});
</script>


@endsection
