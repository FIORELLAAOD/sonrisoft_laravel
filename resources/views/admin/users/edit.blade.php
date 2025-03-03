@extends('layouts.app')
@section('title','Editar Usuario')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">

<p style="text-align: center;margin-bottom: 3px;color: #077DC7;">
  <i class="fa fa-user"></i>  EDITAR DATOS DE USUARIO
</p>


 {!! Form::open(['route'=>['users.update',$viewUsers->id],'method'=>'PUT']) !!}

        
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Nombres</small>
            <input type="text" name="name" class="form-control" style="text-transform: capitalize; " value="{{ $viewUsers->name }}" required="" placeholder="Nombres y apellidos">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tipo Usuario</small>
                {!! Form::select('Rol',['Administrador'=>'Administrador','Paciente'=>'Paciente'],$viewUsers->Rol,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!} 
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tipo documento</small>
                {!! Form::select('TipoDoc',['DNI'=>'DNI','RUC'=>'RUC'],$viewUsers->TipoDoc,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required','id'=>'tipo'])!!} 
            </div>
               
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">N° documento</small>
                <input type="text" name="NumDoc" id="docu" maxlength="11" minlength="8" class="form-control" value="{{ $viewUsers->NumDoc }}" required="" placeholder="N° de documento" onKeyPress="return soloNumeros(event)">   
            </div>              
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Telefono</small>
                <input type="text" name="Telefono"  maxlength="9" class="form-control" value="{{ $viewUsers->Telefono }}" required="" placeholder="Telefono" minlength="6" onKeyPress="return soloNumeros(event)">  
            </div>                
        </div>

        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Email</small>
            <input type="email" name="email" class="form-control" style="text-transform: lowercase;" value="{{ $viewUsers->email }}" required="" placeholder="Correo electrónico">
            </div>
        </div>


        <br><h5 style="text-align: center">CONTRASEÑA DE USUARIO</h5>
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Contraseña</small>
            <input type="password" id="clave1" name="password" class="form-control" value="" >
            <span style="color: #BB770B;"> <i class="fa fa-info"></i> <i>Opcional</i></span>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Confirmar Contraseña</small>
            <input type="password"id="clave2"  name="password2" class="form-control" value="" >
            <span style="color: #BB770B;"> <i class="fa fa-info"></i> <i>Opcional</i></span>
            </div>
        </div>
<p style="color: #F15858;text-align: center;display: none;" id="mensaje">
    <i class="fa fa-remove"></i> Las contraseñas no coinciden..!
</p>

        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Guardar</button>
          <a href="{{ route('users.index') }}" class="btn btn-dark"><i class="fa fa-remove"></i> Cancelar</a>
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
    $('#tipo').change(function(){
        if ($('#tipo').val()=='DNI') {
            $('#docu').attr('maxlength','8');
            $('#docu').attr('minlength','8');
        }
        else if ($('#tipo').val()=='RUC') {
            $('#docu').attr('maxlength','11');
            $('#docu').attr('minlength','11');
        }else{
            $('#docu').attr('maxlength','11');
            $('#docu').attr('minlength','8');   
        }
    });

$('#clave1').keyup(function(){
    var c1=$('#clave1').val();
    var c2=$('#clave2').val();
    if (c1==c2) {
        $('#mensaje').hide();
    }else{
        $('#mensaje').show();   
    }
});


$('#clave2').keyup(function(){
    var c1=$('#clave1').val();
    var c2=$('#clave2').val();
    if (c1==c2) {
        $('#mensaje').hide();
    }else{
        $('#mensaje').show(); 
    }
});


});
</script>
    
</div>

@endsection
