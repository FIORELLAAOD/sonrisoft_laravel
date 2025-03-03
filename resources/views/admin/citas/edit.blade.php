@extends('layouts.app')
@section('title','Editar Citas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">

<p style="text-align: center;margin-bottom: 3px;color: #077DC7;">
  <i class="fa fa-calendar-plus-o"></i>  EDITAR CITAS
</p>

{!! Form::open(['route'=>['citas.update',$viewCitas->id],'method'=>'PUT']) !!}
        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tratamientos</small>
                    {!! Form::select('IdTratamientos',$viewTratamientos,$viewCitas->IdTratamientos,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required','id'=>'tratamiento']) !!}  
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Medicos</small>
                    {!! Form::select('IdMedico',$viewMedicos,$viewCitas->IdMedico,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required']) !!} 
            </div>              
        </div>

        <div class="row" style="margin-top: 5px;">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Pacientes</small>
                    {!! Form::select('IdPaciente',$viewPacientes,$viewCitas->IdPaciente,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required']) !!} 
            </div>              
        </div>

            <?php 
                $fecha=date('Y-m-d');
                $hora=date("H:i");
            ?>

        <div class="row" >
            <div class="col-6-12 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Fecha</small>
                <input type="date" name="Fecha" class="form-control"  value="{{ $viewCitas->Fecha }}" required=""  disabled="">  
            </div> 

            <div class="col-6-12 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Hora</small>
                <input type="time" name="Hora" class="form-control"  value="{{ $viewCitas->Hora }}" required="" disabled="">   
            </div> 
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Enfermedad</small>
            <input type="text" name="Enfermedad" class="form-control" style="text-transform: capitalize" value="{{ $viewCitas->Enfermedad }}" required="" placeholder="">   
            </div>        
        </div>

         <div class="row" style="margin-top: 5px;">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <small style="font-size: 11pt;">Estado de cita</small>
                {!! Form::select('Estadocita',['Asignado'=>'Asignado','Atendido'=>'Atendido'],$viewCitas->Estadocita,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required']) !!} 
                </div>         
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <small style="font-size: 11pt;">Estado de cita</small>
                {!! Form::select('Estadopago',['Pendiente'=>'PENDIENTE','Aplicado'=>'APLICADO'],$viewCitas->Estadopago,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required']) !!} 
                </div> 

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Costo</small>
            <input type="number" name="Costo" id="costo" class="form-control"  value="{{ $viewCitas->Costo }}" required="" placeholder="Costo">   
            </div>         
        </div>
 
        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Guardar</button>
            <a href="{{ route('citas.index') }}" class="btn btn-dark"><i class="fa fa-remove"></i> Cancelar</a>
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


            </div>
        </div>
    </div>

<script type="text/javascript">
$( document ).ready(function() {

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

});
</script>
    
</div>

@endsection
