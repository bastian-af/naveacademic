<?php

	require_once('includes/db.php');

	$results = $connection->query('SELECT * FROM Curso');

	$imprimirCursos='<style>table{
	
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
	    			<th>Sigla</th>
	    			<th>Nombre</th>
	    			<th> </th>
	    			<th> </th>
	    			<th> </th>
	    		</tr>';

	while ($fila = $results->fetch_assoc()) {
	    $imprimirCursos.= '<tr>
	    			<td>'.$fila['sigla'].'</td>
	    			<td>'.$fila['nombre'].'</td>
	    			<td><a href="instancias_curso.php?sigla='.$fila['sigla'].' ">Instancias</a></td>
	    			<td><a href="editar_curso.php?sigla='.$fila['sigla'].' ">Editar</a></td>
	    			<td><a href="eliminar_curso.php?sigla='.$fila['sigla'].' ">Eliminar</a></td>
	    			</tr>';
	}
	$imprimirCursos.='</table>';

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
		<h1> Backend Administrativo - Cursos </h1>

		<a href="crear_curso.php" target="_self"> <input type="button" id="botonCC" name="botonCC" value="Crear Nuevo Curso" /></a><br></br>
		
	</body>
</html>
<?php
 echo $imprimirCursos;
?>