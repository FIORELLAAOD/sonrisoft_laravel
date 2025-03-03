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
    <div class="modal-dialog" >
      <div class="modal-content" id="content_modal">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">
                <i class="fa fa-plus"></i> Configuraciones
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             {!! Form::open(['route'=>('configs.store'),'method'=>'POST','files'=>true]) !!}
             <input type="hidden" name="id_tbl" id="id_tbl">

            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <small style="font-size: 11pt;">Descripción</small>
                <input type="text" name="nombre" class="form-control" style="text-transform: capitalize"  required="" placeholder="Descripción" id="nombre">   
                </div>         
            </div>

            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <small style="font-size: 11pt;">Color</small>
                <input type="color" name="color" class="form-control" style="text-transform: capitalize"  required="" placeholder="Color" id="color">   
                </div>         
            </div>

        <hr>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                <button class="btn btn-success" style="margin-right: 5px;" id="btn_guardar"> <i class="fa fa-check"></i> Guardar</button>
            
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="nuevo();"><i class="fa fa-plus"></i> Agregar</button>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'configs.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('name',null,['class'=>'form-control',
        'placeholder'=>'Buscar...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('configs.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
    </div>
    {!! Form::close() !!}
</div> 
                </div>
                <div class="card-body">            

<div class="row">
    
<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>#</th>
        <th>Accion</th>
        <th>Color</th>
        <th>Vista previa</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach($lstdatos as $dato)
            <tr>
                <td></td>
                <td>{{ $dato->nombre }}</td>
                <td> 
                    <span style="color: {{ $dato->color }};font-weight: bold;">{{ $dato->color }}</span> 
                </td>
                <td>
                    <button type="button" class="btn btn-sm" style="background-color: {{ $dato->color }};color: #fff;">{{ $dato->nombre }}</button>
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="editar({{ $dato->id }},'{{ $dato->nombre }}','{{ $dato->color }}')" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-edit"></i> Editar
                    </button>

                  <form style="display: inline;" method="POST" action="{{route('configs.destroy',$dato->id)}}">
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



   

<br>
                </div>
            </div>
        </div>
    </div>

<script >

function nuevo() {
    $('#id_tbl').val('');
    $('#nombre').val('');
    $('#color').val('');
}

function editar(id,nombre,color) {
    $('#id_tbl').val(id);
    $('#nombre').val(nombre);
    $('#color').val(color);
}

$( document ).ready(function() {


});
</script>


</div>



@endsection
