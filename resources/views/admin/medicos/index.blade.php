@inject('especialidades','App\Especialidad')
@extends('layouts.app')
@section('title','Todas los medicos')
@section('content')
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
            <h4 class="modal-title" style="color: #009E60;"><i class="fa fa-user-md"></i> Registro de Nuevo Medico </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             {!! Form::open(['route'=>('medicos.store'),'method'=>'POST','files'=>true]) !!}
<input type="hidden" name="saludo" value="hola">
        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Nombres</small>
            <input type="text" name="Nombres" class="form-control" style="text-transform: capitalize"  value="" required="" placeholder="Nombres">   
            </div>         
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Apellidos</small>
            <input type="text" name="Apellidos" class="form-control" style="text-transform: capitalize" value="" required="" placeholder="Apellidos">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">DNI</small>
                <input type="text" name="DNI"  maxlength="8" class="form-control" value="" required="" placeholder="DNI" minlength="6" onKeyPress="return soloNumeros(event)" id="dni">  
            </div>    
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Especialidad</small>
                    <select  name="IdEspecialidad" class="form-control" required="" >
                        <option value="">Seleccione...</option>
                        @foreach($especialidades::orderby('Descripcion','asc')->get() as $especilidad)
                            <option value="{{$especilidad->id}}">
                                 {{$especilidad->Descripcion}} 
                             </option>
                        @endforeach
                    </select>
            </div>              
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Direccion</small>
            <input type="text" name="Direccion" class="form-control" style="text-transform: capitalize" value="" required="" placeholder="Direccion">   
            </div>         
        </div>

        <div class="row" style="margin-top: 5px;">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Email</small>
            <input type="email" name="Email" class="form-control" style="text-transform:lowercase;" value=""  onkeyup="javascript:this.value=this.value.toLowerCase();" required="" placeholder="Correo electrónico">
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">      
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small style="font-size: 11pt;">Telefono</small>
                <input type="text" name="Telefono"  maxlength="9" class="form-control" value="" required="" placeholder="Telefono" minlength="6" onKeyPress="return soloNumeros(event)">  
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
        <a href="{{ route('home') }}" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-md"></i> Nuevo Medico</a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'medicos.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('Nombres',null,['class'=>'form-control',
        'placeholder'=>'Buscar Medico...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('medicos.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
    </div>
    {!! Form::close() !!}
</div> 
                </div>
                <div class="card-body">            

<p style="text-align: center;color: #677C92;"> {{  $viewMed->total() }} MEDICOS EN TOTAL
    
</p>

<div class="row">
    <div class="col-lg-12" style="overflow-x: scroll;">
<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>#</th>
        <th>Nombres y Apellidos</th>
        <th>DNI</th>
        <th>Especialidad</th>
        <th>Direccion</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        <?php $x=0; ?>
         @foreach($viewMed as $med)
            <?php
                $x++;
            ?>
            <tr>
                <td><img src="{{ asset('images/medico.jpg') }}" alt="" width="25"></td>
                <td>
                    <a href="{{ route('medico.historial',$med->id) }}" class="btn btn-link" target="_blank">
                        <i class="fa fa-print"></i> {{ $med->Nombres }} {{ $med->Apellidos }}
                    </a>
                </td>
                <td>{{ $med->DNI }}</td>
                <td>
                 @foreach($especialidades::where('id',$med->IdEspecialidad)->get() as $especilidad)
                    {{$especilidad->Descripcion}} 
                @endforeach
                </td>
                <td>{{ $med->Direccion }}</td>
                <td>{{ $med->Email }}</td>
                <td>{{ $med->Telefono }}</td>
                <td>
                    <a href="{{ route('medicos.edit',$med->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i> Editar
                    </a>

                  <form style="display: inline;" method="POST" action="{{route('medicos.destroy',$med->id)}}">
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
{!!$viewMed->render()!!}


</div>



   

<br>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$( document ).ready(function() {
$('#dni').keyup(function(){
    validar();
});

function validar(){
    var numero=$('#dni').val();
    if (numero!='' && numero.length==8) {
        $.ajax({
        url:"{{ route('validar.dni') }}",
        data:{numero:numero},
        method:'GET',
        dataType:'json',
        success:function(data){
            if (data.datos=='Si') {
                $('#dni').css('border-color','#F12E2E');
            }else{
                $('#dni').css('border-color','#26C70C');
            }
        }
        });
    }
}

});
</script>




@endsection
