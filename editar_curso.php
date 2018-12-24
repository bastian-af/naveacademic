<?php

	require_once('includes/db.php');

	
    if(isset($_GET['sigla'])){
    	$sigla = htmlspecialchars($_GET['sigla']);
    }else{
    	$sigla = htmlspecialchars($_POST['sigla']);
    }
		
    $result = $connection->query('SELECT * FROM Curso WHERE sigla="'.$sigla.'" ');

    while($fila=$result->fetch_assoc()){
    	$nombre=$fila['nombre'];
    	$descripcion=$fila['descripcion'];
    }


	$consulta = "UPDATE Curso 
					SET nombre= ?,  descripcion= ?
			  		WHERE sigla= ? ";

	$sentencia = $connection->prepare($consulta);

	if(isset($_POST['editarcurso'])){
		$nombre=htmlspecialchars($_POST['nombre']);
		$descripcion=htmlspecialchars($_POST['descripcion']);
		$sigla=htmlspecialchars($_POST['sigla']);
		

		$sentencia->bind_param('ssss',$nombre,$descripcion,$sigla);

		$sentencia->execute();

		header('Location: mantenedor_cursos.php');
	}

?>

<h1> Backend Administrativo - Cursos - <?php echo $sigla; ?> </h1>


<form method='POST' id='crear' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <table>
    	<tr>
    		<td> Sigla:</td>
    		<td><input type='text' name='sigla' value='<?php echo $sigla; ?>' readonly="readonly"/></td>
        <tr>
        <tr>
            <td> Nombre: </td>
            <td><input type='text' name='nombre' value='<?php echo $nombre; ?>' required /> </td>
        </tr>
        <tr>
            <td> Descripcion: </td>
            <td><textarea rows='10' cols= '19' name='descripcion' form='crear' required> <?php echo $descripcion; ?> </textarea></td>
        </tr>

    </table>
    
    <input type='hidden' name='editarcurso'/>
    <input type='submit' value='Editar Curso'/>

</form>
