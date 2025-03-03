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




<br>
<div class="row" >
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'citasm.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('Enfermedad',null,['class'=>'form-control',
        'placeholder'=>'Buscar Citas...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('citasm.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
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




});
</script>


@endsection
