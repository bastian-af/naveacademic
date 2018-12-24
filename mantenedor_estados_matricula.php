<?php

	require_once('includes/db.php');

	$result=$connection->query('SELECT * FROM EstadoMatricula');

	$imprimirEstados='<style>table{
	
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
	    			<th>Estado</th>
	    			<th> </th>
	    			<th> </th>
	    		</tr>';

	while($fila=$result->fetch_array()){
			$imprimirEstados.="<tr>
								<td> ".$fila['estado']." </td>
								<td><a href='editar_estado_matricula.php?id=".$fila['id']." '>Editar </a></td>
								<td><a href='eliminar_estado_matricula.php?id=".$fila['id']." '>Eliminar </a></td>
							</tr>";
	}
	$imprimirEstados.='</table>';

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
		<h1> Backend Administrativo - Estados Matricula </h1>
		<br>
		<a href="crear_estado_matricula.php" target="_self"> <input type="button" id="botonCEM" name="botonCEM" value="Crear Nuevo Estado de Matricula" /></a></br></br>
		
	</body>
</html>



<?php echo $imprimirEstados; ?>



