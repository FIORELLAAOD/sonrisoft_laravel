@extends('layouts.app')
@section('title','Registro')
@section('content')

<div class="row">
    
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    
    <div class="container-contact100">
        <div class="wrap-contact100">
            <div class="contact100-form-title">
                <p style="text-align: center;font-size: 14pt;color: #0E63A4;">
                   <img src="{{ asset('images/check.png') }}" width="70"> Registrarse...
                </p>
            </div>


{!! Form::open(['route'=>('register'),'method'=>'POST']) !!}

        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Nombres</small>
            <input type="text" name="name"  style="text-transform: capitalize"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('name') }}" required  placeholder="Nombres y Apellidos"> 
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif 
        </div>         
        </div>
 
        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tipo documento</small>
                {!! Form::select('TipoDoc',['DNI'=>'DNI','RUC'=>'RUC'],null,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required','id'=>'tipo']) !!} 
            </div>  
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">N° documento</small>
                <input type="text" name="NumDoc" id="docu" maxlength="11" minlength="8" class="form-control{{ $errors->has('NumDoc') ? ' is-invalid' : '' }}"  value="{{ old('NumDoc') }}" required="" placeholder="N° de documento" onKeyPress="return soloNumeros(event)">
                @if ($errors->has('NumDoc'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('NumDoc') }}</strong>
                    </span>
                @endif   
            </div>  

        </div>

        <div class="row" style="margin-top: 5px;">
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Telefono</small>
                <input type="text" name="Telefono"  maxlength="9" class="form-control" value="" required="" placeholder="Telefono" minlength="6" onKeyPress="return soloNumeros(event)">  
            </div>                
        </div>
 
        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Correo Electrónico</small>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Correo Electrónico" style="text-transform:lowercase;" value=""  onkeyup="javascript:this.value=this.value.toLowerCase();">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

            </div>
        </div>

        <br><h5 style="text-align: center"> CONTRASEÑA DE USUARIO</h5>
        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Contraseña</small>
            <input type="password" id="clave1" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="" required="" placeholder="Contraseña">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif  
            </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Confirmar Contraseña</small>
            <input type="password" id="clave2" name="password2" class="form-control" value="" required="" placeholder="Contraseña">
            </div>

        </div>

        <p style="color: #F15858;text-align: center;display: none;" id="mensaje">
            <i class="fa fa-remove"></i> Las contraseñas no coinciden..!
        </p>

        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Guardar</button>
          <a href="{{ route('login') }}" class="btn btn-dark" ><i class="fa fa-remove"></i> Cancelar</a>
      </div>
        </div>  
    </div>
</div>

{!! Form::close() !!}


        </div>
    </div>


</div>




</div>
<script type="text/javascript">
$( document ).ready(function() {
    $('#tipo').change(function(){
        validar();
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

$('#docu').keyup(function(){
    validar();
});

function validar(){
    var tipo=$('#tipo').val();
    var numero=$('#docu').val();
    if (tipo!='' && numero!='' && (numero.length==8 || numero.length==11)) {
        $.ajax({
        url:"{{ route('validar.documento') }}",
        data:{tipo:tipo,numero:numero},
        method:'GET',
        dataType:'json',
        success:function(data){
            if (data.datos=='Si') {
                $('#docu').css('border-color','#F12E2E');
            }else{
                $('#docu').css('border-color','#26C70C');
            }
        }
        });
    }
}

});
</script>

@endsection
