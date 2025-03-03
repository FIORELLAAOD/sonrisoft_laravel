@inject('vCitas','App\Cita')
@inject('vMedicos','App\Medico')
@inject('vTratamientos','App\Tratamiento')
@inject('vUsers','App\Models\User')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Histrial del Paciente</title>
</head>
<body>
	
<p style="text-align: center;">
	HISTORIAL DEL MEDICO
</p>
<p>
	Nombres: 
	<span style="font-size: 15pt;color: #1D6BA7;font-weight: bold;margin-top: 2px;">{{ $viewMed->Nombres }}</span> <br>
	Apellidos: 
	<span style="font-size: 15pt;color: #1D6BA7;font-weight: bold;margin-top: 2px;">{{ $viewMed->Apellidos}}</span> <br>
	DNI: 
	<span style="font-size: 15pt;color: #1D6BA7;font-weight: bold;margin-top: 2px;">{{ $viewMed->DNI }}</span>
</p>

<hr>


<table style="width: 100%;border-style: dashed;border-color: #1768A1;border-radius: 2px;border-width: 1px;">
	<tr style="background-color: #CDD5D6;font-weight: bold;">
		<td>Fecha</td>
		<td>Hora</td>
		<td>Paciente</td>
		<td>Tratamiento</td>
		<td>Costo</td>
	</tr>
	@foreach($vCitas::where('IdMedico',$viewMed->id)->get() as $dato)
		<tr>
			<td>
				<?php 

				$f=date_create($dato->Fecha);
				$fecha=date_format($f,'d/m/Y');
				 ?>
				 {{ $fecha }}
			</td>
			<td>{{ $dato->Hora }}</td>
			<td>
				@foreach($vUsers::where('id',$dato->IdPaciente)->get() as $paciente)
					{{ $paciente->name }}
				@endforeach
			</td>
			<td>
				@foreach($vTratamientos::where('id',$dato->IdTratamientos)->get() as $tratamiento)
					{{ $tratamiento->Tratamientos }} 
				@endforeach
			</td>
			<td>$ {{ $dato->Costo }}</td>
		</tr>
	@endforeach
</table>

</body>
</html>