<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Odontograma..</title>
</head>
<body>

<?php 

?>

<div style="padding: 5px;border-radius: 10px;background-color: #E2F6F7;text-align: center;">
    <b>Odontograma</b> - {{ date('d/m/Y') }}
</div>


<div style="padding: 5px;border-radius: 10px;border: 1px solid #E2F6F7;">
	<table style="width: 100%;">
		<tr>
			<td style="width: 50%;">
				<b>Documento identidad:</b> 
				{{ $dt_paciente->NumDoc }} <br><br>

				<b>Nombres:</b>
				{{ $dt_paciente->name }}
			</td>
			<td style="width: 50%;">
				<b>Email:</b> 
				{{ $dt_paciente->email }} <br><br>

				<b>Telefono:</b>
				{{ $dt_paciente->Telefono }}
			</td>
		</tr>
	</table>
</div>

<br>
<img src="{{ asset('images/sec1.png') }}" alt="" style="max-width: 100%;">
<br><br>
<img src="{{ asset('images/sec2.png') }}" alt="" style="max-width: 100%;">
</body>
</html>