<?php 
echo <<<ENDHTML
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comentarios</title>
	<style>
	table{
		width:100%;
		border:1px solid;
	}
	td{
		padding:2%;
		
	}
	.nota{
		text-align:center;
	}
	</style>
	</head>
	<body>
		<table>
			 <tr>
				<td colspan="4">
					Podría haber utilizado para los colores de pares e impares una variable ODD(booleano) y en cada iteracion cambiarla.(mucho mas limpio)
					He hecho un if/else con un contador
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Mejor entendimiento de como tratar un formulario 
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Aunque no sea de ^PHP, a la hora dar un rating, he utilizado para mejorar la experiencia del usuariole he dado un minimo y un maximo, y sube 0.5 cada vez que utiliza el subir o bajar
				</td>
			</tr>
			
			<tr class="nota">
				<td>Nota Documento: </td>
				<td > 5</td>
				<td>Nota Explicación: </td>
				<td>5 </td>
			</tr>
			<tr class="nota">
				<td>Nota Alumno: </td>
				<td>5</td>
			</tr>
		</table>
	</body>
	</html>
ENDHTML;
?>