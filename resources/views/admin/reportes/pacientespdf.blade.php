@inject('pacientes','App\Models\User')
@inject('medicos','App\Medico')
@inject('citas','App\Cita')
@inject('tratamientos','App\Tratamiento')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de todos los pacientes</title>
</head>
<body>
    
<p style="text-align: center;font-size: 13pt;color: #0690A0;font-weight: bold;">
    <img src="images/favicon.png" alt="" width="30"> REPORTE GENERAL DEL HISTORIAL DE TODOS LOS PACIENTES <br>
@if($vInicio!='' && $vFin!='' && ($vInicio!='0' && $vFin!=''))
    <span style="font-size: 14pt;color: #424444;">
    <?php 
        $fi=date_create($vInicio);
        $tfi=date_format($fi,'d/m/Y');
        
        $ff=date_create($vFin);
        $tff=date_format($ff,'d/m/Y');
     ?>             
         {{ $tfi }} -  {{ $tff }}
    </span>
@endif
</p>

<table style="border-width: 1px;border-style: solid;border-color: #01578E;border-radius: 4px;">
    <tr style="background-color: #E0E8FD;color: #01578E;">
        <td>#</td>
        <td>DNI</td>
        <td>Nombres</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Medico</td>
        <td>Tratamiento</td>
        <td>Enfermedad</td>
        <td>Costo</td>
    </tr>
     @foreach($viewDatos as $usu)
        <?php $cCitasx=$citas::where('IdPaciente',$usu->id)->count('id'); ?>
        @if($cCitasx>0)
           <!-- CON PARAMETROS DE NOMBRES PERO SIN FECHAS -->
           @if(($vInicio=='0' && $vFin=='0') || ($vInicio=='0' && $vFin!='') || ($vInicio!='' && $vFin=='0'))
            @foreach($citas::where('IdPaciente',$usu->id)->get() as $cita)
            <tr>
                <td>
                    <img src='{{ asset("images/Users/Default.png") }}' width="20">
                </td>
                <td> {{ $usu->NumDoc }}</td>
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
           @if($vInicio!='' && $vFin!='' && ($vInicio!='0' && $vFin!='0'))
            @foreach($citas::where('IdPaciente',$usu->id)->where('Fecha','>=',$vInicio)->where('Fecha','<=',$vFin)->get() as $cita)
            <tr>
                <td>
                    <img src='{{ asset("images/Users/Default.png") }}' width="20">
                </td>
                <td> {{ $usu->NumDoc }}</td>
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
</table>

</body>
</html>