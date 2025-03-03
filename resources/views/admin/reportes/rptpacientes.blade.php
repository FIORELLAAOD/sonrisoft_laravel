@inject('pacientes','App\Models\User')
@inject('medicos','App\Medico')
@inject('citas','App\Cita')
@inject('tratamientos','App\Tratamiento')
@extends('layouts.app')
@section('title','Reporte por Paciente')
@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row" >
                        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            <a href="{{ route('reportes.index') }}" class="btn btn-link"><i class="fa fa-reply"></i> Volver </a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            {!! Form::open(['route'=>'rpt.pacientes','method'=>'GET']) !!}
                        <div class="input-group">
                            {!! Form::select('Paciente',$vPacientes,$vPaciente,['class'=>'form-control','placeholder'=>'TODOS...']) !!}

                            <input type="date" name="Inicio" class="form-control" style="border-radius: 4px;margin-left: 5px;" value="{{ $vInicio }}">
                             <input type="date" name="Fin" class="form-control" style="border-radius: 4px;margin-left: 5px;" value="{{ $vFin }}">
                            <button class="btn btn-success" style="margin-left: -3px;"> <i class="fa fa-search"> </i> </button>
                        </div>

                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            <a href="{{ route('rpt.pacientes') }}" class="btn btn-info"><i class="fa fa-refresh"></i></a>
                        </div>
                        {!! Form::close() !!}
                    </div> 
                </div>
                <div class="card-body">
                    @if($vInicio!='' && $vFin!='')
                        @if($vInicio > $vFin)
                            <p style="font-size: 12pt;color: #E03535;"><i class="fa fa-info"></i> Hay incoherencia en las Fechas..!</p>
                        @endif
                        @if($vTipo=='Individual')
                        <?php $cCitas=$citas::where('IdPaciente',$vPaciente)->count('id'); ?>
                            @if($cCitas>0)
                             <a href="{{ route('rpt.rptpacienteindiv',$arrFechas) }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="fa fa-print"></i> Imprimir Historial...
                            </a>
                            @endif
                        @endif
                        @if($vTipo=='Todos')
                            <a href="{{ route('rpt.pacientestodo',$arrFechas) }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="fa fa-print"></i> Generar Reporte
                            </a>
                        @endif
                    @else
                        @if($vTipo=='Individual')
                        <?php $cCitas=$citas::where('IdPaciente',$vPaciente)->count('id'); ?>
                            @if($cCitas>0)
                             <a href="{{ route('paciente.historial',$vPaciente) }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="fa fa-print"></i> Imprimir Historial...
                            </a>
                            @endif
                        @endif
                        @if($vTipo=='Todos')
                            <a href="{{ route('rpt.pacientestodo',$arrFechas) }}" class="btn btn-link btn-sm" target="_blank">
                                <i class="fa fa-print"></i> Generar Reporte
                            </a>
                        @endif
                    @endif


<div class="row"> 
<table class="table table-striped" style="border-width: 1px;border-style: dashed;border-color: #01578E;">
    <thead style="background-color: #E0E8FD;color: #01578E;">
        <th>#</th>
        <th>Documento</th>
        <th>Nombres</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Medico</th>
        <th>Tratamiento</th>
        <th>Enfermedad</th>
        <th>Costo</th>
    </thead>
    <tbody>
        @foreach($viewDatos as $usu)
        <?php $cCitasx=$citas::where('IdPaciente',$usu->id)->count('id'); ?>
        @if($cCitasx>0)
           <!-- CON PARAMETROS DE NOMBRES PERO SIN FECHAS -->
           @if(($vInicio=='' && $vFin=='') || ($vInicio=='' && $vFin!='') || ($vInicio!='' && $vFin==''))
            @foreach($citas::where('IdPaciente',$usu->id)->get() as $cita)
            <tr>
                <td>
                    <img src='{{ asset("images/Users/Default.png") }}' width="20">
                </td>
                <td>{{ $usu->TipoDoc }} - {{ $usu->NumDoc }}</td>
                <td>{{ $usu->name }}</td>
                <td>
                    <?php 
                        $fc=date_create($cita->Fecha);
                        $tfc=date_format($fc,'d/m/Y');
                     ?>
                    {{ $tfc }}
                </td>
                <td>
                    <?php 
                        $hc=date_create($cita->Hora);
                        $thc=date_format($hc,'H:i');
                     ?>
                    {{ $thc }}
                </td>
                <td>
                    @foreach($medicos::where('id',$cita->IdMedico)->get() as $medico)
                        {{ $medico->Nombres }} {{ $medico->Apellidos }}
                    @endforeach
                </td>
                <td>
                    @foreach($tratamientos::where('id',$cita->IdTratamientos)->get() as $tratamiento)
                        {{ $tratamiento->Tratamientos }}
                    @endforeach
                </td>
                <td>{{ $cita->Enfermedad }}</td>
                <td>s/. {{ $cita->Costo }}</td>
            </tr>
            @endforeach
            @endif

            <!-- CON PARAMETROS DE FECHAS Y NOMBRES -->
           @if($vInicio!='' && $vFin!='')
            @foreach($citas::where('IdPaciente',$usu->id)->where('Fecha','>=',$vInicio)->where('Fecha','<=',$vFin)->get() as $cita)
            <tr>
                <td>
                    <img src='{{ asset("images/Users/Default.png") }}' width="20">
                </td>
                <td>{{ $usu->TipoDoc }} - {{ $usu->NumDoc }}</td>
                <td>{{ $usu->name }}</td>
                <td>
                    <?php 
                        $fc=date_create($cita->Fecha);
                        $tfc=date_format($fc,'d/m/Y');
                     ?>
                    {{ $tfc }}
                </td>
                <td>
                    <?php 
                        $hc=date_create($cita->Hora);
                        $thc=date_format($hc,'H:i');
                     ?>
                    {{ $thc }}
                </td>
                <td>
                    @foreach($medicos::where('id',$cita->IdMedico)->get() as $medico)
                        {{ $medico->Nombres }} {{ $medico->Apellidos }}
                    @endforeach
                </td>
                <td>
                    @foreach($tratamientos::where('id',$cita->IdTratamientos)->get() as $tratamiento)
                        {{ $tratamiento->Tratamientos }}
                    @endforeach
                </td>
                <td>{{ $cita->Enfermedad }}</td>
                <td>s/. {{ $cita->Costo }}</td>
            </tr>
            @endforeach
            @endif

        @endif
        @endforeach
    </tbody>
</table>

{!!$viewDatos->render()!!}

</div>



                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$( document ).ready(function() {


});
</script>

@endsection
