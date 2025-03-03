@extends('layouts.app')
@section('title','Todas las especialidades')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">

<div class="row">
  <!-- The Modal -->
  <div class="modal fade" id="frmborrar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="color: #009E60;"><i class="fa fa-info"></i> Confirmar.!! </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
             {!! Form::open(['route'=>('borrar.lstespecialidad'),'method'=>'POST','files'=>true]) !!}
             <input type="hidden" name="ListaBorrar" id="listaborrar">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                               <img src="{{ asset('images/pregunta.png') }}" width="50">
                        </div> 
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                               <p style="font-size: 12pt;color: #826C38;">
                                   Está seguro(a) de <b>EMILINAR</b> los registros seleccionados.?
                               </p>
                        </div>                                  
                    </div>
                    <hr>
                    <div class="row">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <button class="btn btn-success" style="margin-right: 5px;"> <i class="fa fa-check"></i> Aceptar</button>
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
<!-- ===================================================================================== -->


<div class="row">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" style="color: #009E60;"><i class="fa fa-briefcase"></i> Registro de Nueva Especialidad </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             {!! Form::open(['route'=>('especialidades.store'),'method'=>'POST','files'=>true]) !!}

        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Descripcion</small>
            <input type="text" name="Descripcion" class="form-control" style="text-transform: uppercase" value="" required="" placeholder="Descripcion">   
            </div>         
        </div>

        <hr>
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

<div class="row" >
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('home') }}" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-briefcase"></i> Nueva Especialidad</a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'especialidades.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('Descripcion',null,['class'=>'form-control',
        'placeholder'=>'Buscar Especialidad...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('especialidades.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
    </div>
    {!! Form::close() !!}
</div> 
                </div>
                <div class="card-body">            

<p style="text-align: center;color: #677C92;">  {{  $viewDatos->total() }} ESPECIALIDADES EN TOTAL
    
</p>

<div class="row">
<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>#</th>
        <th style="width: 40%;">Descripcion</th>
        <th>Opciones</th>
        <th><input type="checkbox" id ="seleccionar" /> Todo
            <a href="#" style="margin-left: 10px;display: none;color: #CB4C4C;" id="btnborrar" data-toggle="modal" data-target="#frmborrar"><i class="fa fa-remove"></i> Borrar</a>
        </th>
    </thead>
    <tbody>
        <?php $x=0; ?>
        @foreach($viewDatos as $dato)
            <?php
                $x++;
            ?>
            <tr  id=" {{$dato->id}}">
                <td>{{ $x }}</td>
                <td>{{ $dato->Descripcion }}</td>
                <td>
                    <a href="{{ route('especialidades.edit',$dato->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i> Editar
                    </a>

                  <form style="display: inline;" method="POST" action="{{route('especialidades.destroy',$dato->id)}}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" onclick="return confirm('¿Seguro que desea ELIMINAR. ?')" class="btn btn-danger btn-sm" >
                      <i class="fa fa-remove"></i> Eliminar
                    </button>
                  </form>
                </td>
                <td> <input type="checkbox" id="cbx{{ $dato->id }}" class="casilla" value="{{ $dato->id }}"/></td>
            </tr>

        @endforeach
    </tbody>
</table>




</div>

    <div class="text-center">
        {!! $viewDatos->render()!!}
    </div>

   

<br>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$( document ).ready(function() {
    $("#seleccionar").change(function() {  
        if ($('#seleccionar').prop('checked')) {
            $('.casilla').prop('checked',true);
        }else{
            $('.casilla').prop('checked',false);
        }
        CargarChecks();
    }); 
var lista = [];
function CargarChecks(){
    var i = 0;
    lista = [];
    $('.casilla:checked').each(function () {
       lista.push({'id':$(this).val()});
    }); 
    if (lista.length>0) {
        $('#btnborrar').show();
    }else{
        $('#btnborrar').hide();
    }
    var encapsulado=JSON.stringify(lista);
    $('#listaborrar').val(encapsulado);
}

$('.casilla').change(function(){ CargarChecks(); });

$('#btnborrar').click(function(){



});

});
</script>



</div>



@endsection
