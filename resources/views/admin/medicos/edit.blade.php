@extends('layouts.app')
@section('title','Editar Usuario')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">

<p style="text-align: center;margin-bottom: 3px;color: #077DC7;">
  <i class="fa fa-user-md"></i>  EDITAR DATOS DE MEDICO
</p>

{!! Form::open(['route'=>['medicos.update',$viewMed->id],'method'=>'PUT']) !!}
        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Nombres</small>
            <input type="text" name="Nombres" class="form-control" style="text-transform: capitalize" value="{{ $viewMed->Nombres }}" required="" placeholder="Nombres">   
            </div>         
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Apellidos</small>
            <input type="text" name="Apellidos" class="form-control" style="text-transform: capitalize" value="{{ $viewMed->Apellidos }}" required="" placeholder="Apellidos">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">DNI</small>
                <input type="text" name="DNI"  maxlength="8" class="form-control" value="{{ $viewMed->DNI }}" required="" placeholder="DNI" minlength="6" onKeyPress="return soloNumeros(event)">  
            </div>    
           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Especialidad</small>
                    {!! Form::select('IdEspecialidad',$viewEspe,$viewMed->IdEspecialidad,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required'])!!} 
            </div>              
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Direccion</small>
            <input type="text" name="Direccion" class="form-control" style="text-transform: capitalize" value="{{ $viewMed->Direccion }}" required="" placeholder="Direccion">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Email</small>
            <input type="email" name="Email" class="form-control" style="text-transform:lowercase;" value="{{ $viewMed->Email}}"  onkeyup="javascript:this.value=this.value.toLowerCase();" required="" placeholder="Correo electrónico">
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">      
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Telefono</small>
                <input type="text" name="Telefono"  maxlength="9" class="form-control" value="{{ $viewMed->Telefono }}" required="" placeholder="Telefono" minlength="6" onKeyPress="return soloNumeros(event)">  
            </div>                
        </div>
 
        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Guardar</button>
            <a href="{{ route('medicos.index') }}" class="btn btn-dark"><i class="fa fa-remove"></i> Cancelar</a>
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


});
</script>
    
</div>

@endsection
