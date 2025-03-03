@extends('layouts.app')
@section('title','Todas los usuarios')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">


<div class="row">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" style="color: #009E60;"><i class="fa fa-user-plus"></i> Registro de Nuevo Usuario </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             {!! Form::open(['route'=>('users.store'),'method'=>'POST','files'=>true]) !!}

        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Nombres</small>
            <input type="text" name="name" class="form-control" style="text-transform: capitalize" value="" required="" placeholder="Nombres y apellidos">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tipo Usuario</small>
                {!! Form::select('Rol',['Administrador'=>'Administrador'],null,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!} 
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tipo documento</small>
                {!! Form::select('TipoDoc',['DNI'=>'DNI','RUC'=>'RUC'],null,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required','id'=>'tipo']) !!} 
            </div>            
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">N° documento</small>
                <input type="text" name="NumDoc" id="docu" maxlength="11" minlength="8" class="form-control" value="" required="" placeholder="N° de documento" onKeyPress="return soloNumeros(event)">   
            </div>              
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Telefono</small>
                <input type="text" name="Telefono"  maxlength="9" class="form-control" value="" required="" placeholder="Telefono" minlength="6" onKeyPress="return soloNumeros(event)">  
            </div>                
        </div>
 
        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Email</small>
            <input type="email" name="email" class="form-control" style="text-transform:lowercase;" value="" id="correo" onkeyup="javascript:this.value=this.value.toLowerCase();" required="" placeholder="Correo electrónico">
            </div>
        </div>

        <br><h5 style="text-align: center"> CONTRASEÑA DE USUARIO</h5>
        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Contraseña</small>
            <input type="password" id="clave1" name="password" class="form-control" value="" required="" placeholder="Contraseña">
            </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Confirmar Contraseña</small>
            <input type="password" id="clave2" name="password" class="form-control" value="" required="" placeholder="Contraseña">
            </div>
        </div>

<p style="color: #F15858;text-align: center;display: none;" id="mensaje">
    <i class="fa fa-remove"></i> Las contraseñas no coinciden..!
</p>

        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <button class="btn btn-success" style="margin-right: 5px;"  disabled id="btn_guardar"> <i class="fa fa-check"></i> Guardar</button>
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


<div class="row" >
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('home') }}" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus"></i> Nuevo Usuario</a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'users.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('name',null,['class'=>'form-control',
        'placeholder'=>'Buscar Usuario...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
    </div>
    {!! Form::close() !!}
</div> 
                </div>
                <div class="card-body">            

<p style="text-align: center;color: #677C92;"> {{  $viewUsers->total() }} USUARIOS EN TOTAL
    
</p>

<div class="row">
    <div class="col-lg-12" style="overflow-x: scroll;">
        

<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>Foto</th>
        <th>Rol</th>
        <th>Documento</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach($viewUsers as $usu)
            <?php
            $foto=$usu->Foto;
            ?>
            <tr>
                <td>
                    @if($usu->Rol=='Paciente')
                        <img src="{{ asset('images/paciente.jpg') }}" alt="" width="20">
                    @elseif($usu->Rol=='Medico')
<img src="{{ asset('images/medico.jpg') }}" alt="" width="20">
                    @else
                    <img src="{{ asset('images/Users/Default.png') }}" alt="" width="20">
                    @endif
                </td>
                <td>{{ $usu->Rol }}</td>
                <td>{{ $usu->TipoDoc }} - {{ $usu->NumDoc }}</td>
                <td>
                    @if($usu->Rol=='Paciente')
                    <a href="{{ route('paciente.historial',$usu->id) }}" class="btn btn-link btn-sm" target="_blank">
                        <i class="fa fa-print"></i> {{ $usu->name }}
                    </a>
                    @else
                        {{ $usu->name }}
                    @endif
                </td>
                <td>{{ $usu->email }}</td>
                <td> {{ $usu->Telefono }}</td>
                <td>
                    <a href="{{ route('users.edit',$usu->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i> Editar
                    </a>

                  <form style="display: inline;" method="POST" action="{{route('users.destroy',$usu->id)}}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')" class="btn btn-danger btn-sm" >
                      <i class="fa fa-remove"></i> Eliminar
                    </button>
                  </form>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
{!!$viewUsers->render()!!}


</div>



   

<br>
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


$('#docu').change(function(){ validar(); });
$('#docu').keyup(function(){ validar(); });

$('#correo').change(function(){ validar(); });
$('#correo').keyup(function(){ validar(); });
//

function validar(){
    var correo=$('#correo').val();
    var numero=$('#docu').val();
    if (correo!='' && numero!='') {
        $.ajax({
        url:"{{ route('validar.documento') }}",
        data:{correo:correo,numero:numero},
        method:'GET',
        dataType:'json',
        success:function(data){
            if (data.docu=='Si') {
                $('#docu').css('border-color','#F12E2E');
                $('#btn_guardar').prop('disabled',true);
            }else{
                $('#docu').css('border-color','#26C70C');
                $('#btn_guardar').prop('disabled',false);
            }

            if (data.correo=='Si') {
                $('#correo').css('border-color','#F12E2E');
                $('#btn_guardar').prop('disabled',true);
            }else{
                $('#correo').css('border-color','#26C70C');
                $('#btn_guardar').prop('disabled',false);
            }
        }
        });
    }
}

});
</script>


</div>



@endsection
