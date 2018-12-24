<?php

	require_once('includes/db.php');

	$results = $connection->query('SELECT * FROM Alumno');

	$imprimirAlumnos='<style>table{
	
					  	margin: 3px;
					  	padding: 2px;
					  	border-collapse: collapse;
					  	color: White;
					}
					tr, th, td{
						border: black 1px solid;
						text-align:center;
						color: White;
					}
					th{
						background:  #34495e;	
						color: White;
					}
					tr, td{
						background:  #16a085;
						color: White;
					}
					button{
						background:  #16a085;
						color: White;
					}
					</style>
				<table>
				<tr>
	    			<th>Rut</th>
	    			<th>Nombres</th>
	    			<th>Apellido Paterno</th>
	    			<th>Apellido Materno</th>
	    			<th> </th>
	    			<th> </th>
	    		</tr>';

	while ($fila = $results->fetch_assoc()) {
	    $imprimirAlumnos.= '<tr>
	    			<td>'.$fila['rut'].'</td>
	    			<td>'.$fila['nombres'].'</td>
	    			<td>'.$fila['apellido_paterno'].'</td>
	    			<td>'.$fila['apellido_materno'].'</td>
	    			<td><a href="editar_alumno.php?rut='.$fila['rut'].'" ">Editar</a></td>
	    			<td><a href="eliminar_alumno.php?rut='.$fila['rut'].'" ">Eliminar</a></td>
	    			</tr>';
	}
	$imprimirAlumnos.='</table>';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
 
    <title>Mantenedor Alumnos</title>

    <style type="text/css">
		
		body{
			font-family: arial;
		}
	</style>
    
</head>
<body>

	<h1> Backend Administrativo - Alumnos </h1>

<a href="crear_alumno.php" target="_self"> <input type="button" id="botonCA" name="botonCA" value="Crear Alumno" /></a><br>
	
	</br>
	</br>

</body>
</html>

<?php
 echo $imprimirAlumnos;
?>