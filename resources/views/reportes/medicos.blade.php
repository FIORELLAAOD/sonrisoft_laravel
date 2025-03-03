@inject('especialidades','App\Especialidad')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reporte - Médicos</title>
</head>
<body>
	
<div style="width: 100%;padding: 10px;border-radius:10px;border: solid 1px #CDECF3;background-color: #E2F6F7;text-align: center;">
	REPORTE DE MÉDICOS
</div>
<p style="text-align: right;">
	{{ date('d/m/Y h:i:s a') }}
</p>


<div style="width: 100%;padding: 10px;border-radius:10px;border: solid 1px #DBDCDC;text-align: center;">
<table style="width: 100%;">
	<tr style="background-color: #E3F3F2;">
		<td>Doc. Identidad</td>
		<td>Nombres</td>
		<td>Especialidad</td>
		<td>Correo</td>
		<td>Teléfono</td>
	</tr>
	@foreach($dt_p as $dato)
		<tr>
			<td>{{ $dato->DNI }}</td>
			<td>{{ $dato->Nombres }} {{ $dato->Apellidos }} </td>
			<td>
                 @foreach($especialidades::where('id',$dato->IdEspecialidad)->get() as $especilidad)
                    {{$especilidad->Descripcion}} 
                @endforeach
			</td>
			<td>{{ $dato->Email }}</td>
			<td>{{ $dato->Telefono }}</td>
		</tr>
	@endforeach	
</table>
</div>

</body>
</html>