@inject('histo','App\Models\Historial')
@extends('layouts.app')
@section('title','Pacientes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">


<div class="row">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content" id="content_modal">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">
                <i class="fa fa-user-plus"></i> Registro de Pacientes
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             {!! Form::open(['route'=>('pacientes.store'),'method'=>'POST','files'=>true]) !!}
             <input type="hidden" name="id_tbl" id="id_tbl">
             <input type="hidden" name="id_h" id="id_h">
             <div class="row">
                <div class="col-lg-5">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Tipo documento</small>
                {!! Form::select('TipoDoc',['DNI'=>'DNI','RUC'=>'RUC'],null,['class'=>'form-control','placeholder'=>'- - Seleccione - -','required','id'=>'tipo']) !!} 
            </div>            
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">N° documento</small>
                <input type="text" name="NumDoc" id="docu" maxlength="11" minlength="8" class="form-control" value="" required="" placeholder="N° de documento" onKeyPress="return soloNumeros(event)">   
            </div> 

        </div>
 <input type="hidden" id="val_docu"> 
 <input type="hidden" id="val_correo"> 
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Nombres</small>
            <input type="text" name="name" class="form-control" style="text-transform: capitalize" value="" required="" placeholder="Nombres y apellidos" id="nombre">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Email</small>
            <input type="email" name="email" class="form-control" style="text-transform:lowercase;" value=""  onkeyup="javascript:this.value=this.value.toLowerCase();" required="" placeholder="Correo electrónico" id="email">
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">             
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Telefono</small>
                <input type="text" name="Telefono"  maxlength="9" class="form-control" value="" required="" placeholder="Telefono" minlength="6" onKeyPress="return soloNumeros(event)" id="telefono">  
            </div>                
        </div>


  
    </div>
</div>
                </div>
                <div class="col-lg-7" id="div_historial" style="overflow: scroll;overflow-x: hidden;">
                    <div style="display: flex;padding: 5px;border-radius: 10px;background-color: #E2F6F7;justify-content: center;">
                        <b>Historia Clínica</b>
                    </div>
                    <table class="table">
                        <tr>
                            <td><b>Bajo tratamiento médico</b></td>
                            <td>
                                <select name="trata_medic" class="form-control" required id="v1">
                                    <option value="">Seleccione..</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Propenso a la Hemorragia</b></td>
                            <td>
                                <select name="propen_hemo" class="form-control" required id="v2">
                                    <option value="">Seleccione..</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Alérgico a algún medicamento</b></td>
                            <td>
                                <select name="alergico" class="form-control" required id="v3">
                                    <option value="">Seleccione..</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Hipertenso</b></td>
                            <td>
                                <select name="hipertenso" class="form-control" required id="v4">
                                    <option value="">Seleccione..</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Diabético</b></td>
                            <td>
                                <select name="diabetico" class="form-control" required id="v5">
                                    <option value="">Seleccione..</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Embarazada</b></td>
                            <td>
                                <select name="embarazada" class="form-control" required id="v6">
                                    <option value="">Seleccione..</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for=""><b>Motivo de la consulta:</b></label>
                            <textarea class="form-control" required placeholder="Motivo de la consulta" name="motivo_consul" id="v7"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for=""><b>Diagnóstico:</b></label>
                            <textarea class="form-control" placeholder="Diagnóstico" name="diagnostico" id="v8"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for=""><b>Observaciones:</b></label>
                            <textarea class="form-control" placeholder="Observaciones" name="observacion" id="v9"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for=""><b>Referido por:</b></label>
                            <input class="form-control" placeholder="Referido por" name="referido" id="v10">
                        </div>
                    </div>                    
                    <br>
                </div>
             </div>

        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                <button class="btn btn-success" style="margin-right: 5px;" disabled id="btn_guardar"> <i class="fa fa-check"></i> Guardar</button>
            
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
        <a href="{{ route('home') }}" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="nuevo();"><i class="fa fa-user-plus"></i> Nuevo paciente</a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'pacientes.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('name',null,['class'=>'form-control',
        'placeholder'=>'Buscar paciente...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('pacientes.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
    </div>
    {!! Form::close() !!}
</div> 
                </div>
                <div class="card-body">            

<div class="row">
    <div class="col-lg-12" style="overflow-x: scroll;">
        
   
    
<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>Foto</th>
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
                    <img src="{{ asset('images/paciente.jpg') }}" alt="" width="20">
                </td>
                <td>{{ $usu->TipoDoc }} - {{ $usu->NumDoc }}</td>
                <td>
                    <a href="{{ route('paciente.historial',$usu->id) }}" class="btn btn-link btn-sm" target="_blank">
                        <i class="fa fa-print"></i> {{ $usu->name }}
                    </a>
                </td>
                <td>{{ $usu->email }}</td>
                <td> {{ $usu->Telefono }}</td>
                <td>

                    <?php $dt_h=$histo::where('id_paciente',$usu->id)->first(); ?>

                    <button type="button" class="btn btn-info btn-sm" onclick="editar({{ $usu->id }},'{{ $usu->TipoDoc }}','{{ $usu->NumDoc }}','{{ $usu->name }}','{{ $usu->email }}','{{ $usu->Telefono }}','{{ $dt_h->trata_medic }}','{{ $dt_h->propen_hemo }}','{{ $dt_h->alergico }}','{{ $dt_h->hipertenso }}','{{ $dt_h->diabetico }}','{{ $dt_h->embarazada }}','{{ $dt_h->motivo_consul }}','{{ $dt_h->diagnostico }}','{{ $dt_h->observacion }}','{{ $dt_h->referido }}',{{ $dt_h->id }})" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-edit"></i> Editar
                    </button>

                  <form style="display: inline;" method="POST" action="{{route('pacientes.destroy',$usu->id)}}">
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


function nuevo() {
    $('#id_tbl').val('');
    $('#tipo').val('');
    $('#docu').val('');
    $('#nombre').val('');
    $('#email').val('');
    $('#telefono').val('');
    $('#v1').val('');
    $('#v2').val('');
    $('#v3').val('');
    $('#v4').val('');
    $('#v5').val('');
    $('#v6').val('');
    $('#v7').val('');
    $('#v8').val('');
    $('#v9').val('');
    $('#v10').val('');
    $('#id_h').val('');
    $('#val_docu').val('');
    $('#val_correo').val('');
}

function editar(id,tipo_d,num,nombre,email,telf,v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,id_h) {
    $('#id_tbl').val(id);
    $('#tipo').val(tipo_d);
    $('#docu').val(num);
    $('#nombre').val(nombre);
    $('#email').val(email);
    $('#telefono').val(telf);
    $('#v1').val(v1);
    $('#v2').val(v2);
    $('#v3').val(v3);
    $('#v4').val(v4);
    $('#v5').val(v5);
    $('#v6').val(v6);
    $('#v7').val(v7);
    $('#v8').val(v8);
    $('#v9').val(v9);
    $('#v10').val(v10);
    $('#id_h').val(id_h);
    $('#btn_guardar').prop('disabled',false);
    $('#docu').css('border-color','#E7E4E4');
    $('#email').css('border-color','#E7E4E4');
    $('#val_docu').val(num);
    $('#val_correo').val(email);

}

$( document ).ready(function() {



$('#div_historial').css('height',$(window).height()/1.6);

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


$('#docu').change(function(){ validar(); });
$('#docu').keyup(function(){ validar(); });

$('#email').change(function(){ validar(); });
$('#email').keyup(function(){ validar(); });
//

function validar(){
    var correo=$('#email').val();
    var numero=$('#docu').val();
    var idp=$('#id_tbl').val();
    var validar='no';

    if (idp=='') { 
        validar='si' 
    }else{
        if (correo!=$('#val_correo').val() || numero!=$('#val_docu').val()) {
            validar='si'
        }
    }

    if (correo!='' && numero!='' && validar=='si') {
        $.ajax({
        url:"{{ route('validar.documento') }}",
        data:{correo:correo,numero:numero},
        method:'GET',
        dataType:'json',
        success:function(data){
            console.log(data)
            if (data.docu=='Si' && numero!=$('#val_docu').val()) {
                $('#docu').css('border-color','#F12E2E');
                $('#btn_guardar').prop('disabled',true);
            }else{
                $('#docu').css('border-color','#26C70C');
                $('#btn_guardar').prop('disabled',false);
            }

            if (data.correo=='Si' && correo!=$('#val_correo').val()) {
                $('#email').css('border-color','#F12E2E');
                $('#btn_guardar').prop('disabled',true);
            }else{
                $('#email').css('border-color','#26C70C');
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
