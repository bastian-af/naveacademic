<?php

	require_once('includes/db.php');

	
    if(isset($_GET['id'])){
    	$id = htmlspecialchars($_GET['id']);
    }else{
    	$id = htmlspecialchars($_POST['id']);
    }
	
    $result = $connection->query('SELECT * FROM EstadoMatricula WHERE id="'.$id.'" ');

    while($fila=$result->fetch_assoc()){
        $estado=$fila['estado'];
    }

	$consulta = "UPDATE EstadoMatricula 
					SET estado= ?
			  		WHERE id= ? ";

	$sentencia = $connection->prepare($consulta);

	if(isset($_POST['Editardatos'])){
		$estado=htmlspecialchars($_POST['estado']);
		$id=htmlspecialchars($_POST['id']);


		$sentencia->bind_param('ss',$estado,$id);

		$sentencia->execute();

		header('Location: mantenedor_estados_matricula.php');
	}


?> 

<h1> Backend Administrativo - Estados Matricula - <?php echo $id; ?> </h1>

<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <table>
    	<tr>
    		<td> Id:</td>
    		<td><input type='text' name='id' value='<?php echo $id; ?>' readonly="readonly"/></td>
        <tr>
            <td>Estado: </td>
            <td><input type='text' name='estado' value='<?php echo $estado; ?>' /></td>
        </tr>
    </table>
    
    <input type='hidden' name='Editardatos'/>
    <input type='submit' value='Editar Estado Matricula'/>

</form>
