@inject('medicos','App\Medico')
@inject('pacientes','App\Models\User')
@inject('especialidades','App\Especialidad')
@inject('tratamientos','App\Tratamiento')
@extends('layouts.app')
@section('title','Historial de citas')
@section('content')

    <div class="row justify-content-center">
        <div  class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
            <div class="card">
                <div class="card-header">




<div class="row" >
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a>
    </div>
    
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        {!! Form::open(['route'=>'pagosm.index','method'=>'GET']) !!}
    <div class="input-group">
        {!! Form::text('Tratamientos',null,['class'=>'form-control',
        'placeholder'=>'Buscar Citas...','aria-describedby'=>'search','id'=>'buscar'])!!}
        <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"></i> </button>
    </div>    
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <a href="{{ route('pagosm.index') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
    </div>
    {!! Form::close() !!}
</div> 
                </div>
                <div class="card-body">            

<span style="text-align: center;color: #677C92;"> <b>{{  $viewCitas->total() }}</b> CITAS.
</span>

<div class="row">    
<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>#</th>
        <th>Paciente</th>
        <th>Tratamientos</th>
        <th>Enfermedad</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Pago</th>
        <th>Costo</th>
        <th>Pagado</th>
        <th>Saldo</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        <?php $x=0; ?>
         @foreach($viewCitas as $cit)
            <?php
                $x++;
            ?>
            <tr>
                <td>{{ $x }}</td>
                <td>
                @foreach($pacientes::where('id',$cit->IdPaciente)->get() as $paciente)
                    {{ $paciente->NumDoc }} - {{ $paciente->name }}
                @endforeach
                </td>                
                <td>
                @foreach($tratamientos::where('id',$cit->IdTratamientos)->get() as $tratamiento)
                    {{ $tratamiento->Tratamientos }}
                @endforeach
                </td>
                <td>{{ $cit->Enfermedad }}</td> 
                <td>
                    <?php 
                        $f=date_create($cit->Fecha);
                        $ft=date_format($f,'d/m/Y');
                      ?>
                      {{ $ft }}
                </td>
                <td>
                    <?php 
                        $h=date_create($cit->Hora);
                        $ht=date_format($h,'H:i');
                      ?>
                      {{ $ht }}
                </td>
                <td>
                    @if($cit->Estadopago=='Aplicado')
                        <small style="font-weight: bold;color: #048B60;"><i class="fa fa-money"></i> Aplicado</small>  
                    @else
                        <small style="font-weight: bold;color: #D1220B;"><i class="fa fa-spinner"></i> Pendiente</small> 
                    @endif
                </td>
                <td>{{ 's/.' }}{{ $cit->Costo }}</td>
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
                    @if($cit->Pagado==0)
                        <span style="color: #F01A1A;font-weight: bold;">s/.{{ $cit->Saldo }}</span>
                    @elseif($cit->Pagado >0 && $cit->Pagado < $cit->Costo)
                        <span style="color: #EFA10A;font-weight: bold;">s/.{{ $cit->Saldo }}</span>
                    @else
                    <span style="color: #05B411;font-weight: bold;">{{ $cit->Saldo }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('pagosm.show',$cit->id) }}" class="btn btn-link btn-sm">
                        <i class="fa fa-list"></i> Ver...
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!!$viewCitas->render()!!}


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
