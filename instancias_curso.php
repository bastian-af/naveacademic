<?php

	require_once('includes/db.php');

	if(isset($_GET['sigla'])){
    	$sigla = htmlspecialchars($_GET['sigla']);
    }else{
    	$sigla = htmlspecialchars($_POST['sigla']);
    }

    $result=$connection->query('SELECT * FROM Curso WHERE sigla="'.$sigla.'"');

    while ($fila = $result->fetch_assoc()) {
    	$mostrar=$sigla;
    	$mostrar.=' ';
    	$mostrar.=$fila['nombre'];
    }

    $consulta='SELECT *
    			FROM InstanciaCurso
    			WHERE sigla_curso="'.$sigla.'" 
    			';

    $results=$connection->query($consulta);

    $imprimirInstancias='<style>table{
	
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
	    			<th>Año</th>
	    			<th>Semestre</th>
	    			<th> </th>
	    			<th> </th>
	    		</tr>';

	while ($fila = $results->fetch_assoc()) {
	    $imprimirInstancias.= '<tr>
	    			<td>'.$fila['agno'].'</td>
	    			<td>'.$fila['semestre'].'</td>
	    			<td><a href="matricula_instancia_curso.php?sigla='.$fila['sigla_curso'].'&agno='.$fila['agno'].'&semestre='.$fila['semestre'].' ">Ver Inscritos</a></td>
	    			<td><a href="eliminar_instancia.php?sigla='.$fila['sigla_curso'].'&agno='.$fila['agno'].'&semestre='.$fila['semestre'].'">Eliminar</a></td>
	    			</tr>';
	}
	$imprimirInstancias.='</table>';

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

<h1> Backend Adminstrativo - Cursos - Instancias <?php echo $mostrar; ?> </h1>

<a href="crear_instancia_curso.php?sigla=<?php echo $sigla; ?> " target="_self"> <input type="button" id="botonCIC" name="botonCIC" value="Crear Instancia Curso" /></a><br></br>

	</body>
</html>

<?php echo $imprimirInstancias; ?> 


