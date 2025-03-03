@inject('vCitas','App\Cita')
@inject('vMedicos','App\Medico')
@inject('vTratamientos','App\Tratamiento')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Histrial del Paciente</title>
</head>
<body>
	
<p style="text-align: center;">
	HISTORIAL DEL PACIENTE
</p>
<p>
	Nombres: 
	<span style="font-size: 15pt;color: #1D6BA7;font-weight: bold;margin-top: 2px;">{{ $viewPaciente->name }}</span> <br>
	DNI: 
	<span style="font-size: 15pt;color: #1D6BA7;font-weight: bold;margin-top: 2px;">{{ $viewPaciente->NumDoc }}</span>
</p>

<hr>


<table style="width: 100%;border-style: dashed;border-color: #1768A1;border-radius: 2px;border-width: 1px;">
	<tr style="background-color: #CDD5D6;font-weight: bold;">
		<td>Fecha</td>
		<td>Hora</td>
		<td>Tratamiento</td>
		<td>Medico</td>
		<td>Enfermedad</td>
		<td>Costo</td>
	</tr>
	@foreach($vCitas::where('IdPaciente',$viewPaciente->id)->get() as $dato)
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
				@foreach($vTratamientos::where('id',$dato->IdTratamientos)->get() as $tratamiento)
					{{ $tratamiento->Tratamientos }}
				@endforeach
			</td>
			<td>
				@foreach($vMedicos::where('id',$dato->IdMedico)->get() as $medico)
					{{ $medico->Nombres }} {{ $medico->Apellidos }}
				@endforeach
			</td>
			<td>{{ $dato->Enfermedad }}</td>
			<td>$ {{ $dato->Costo }}</td>
		</tr>
	@endforeach
</table>

</body>
</html>