<?php

	
	require_once('includes/db.php');

	$consulta = "INSERT INTO EstadoMatricula(id,estado)	VALUES (?,?) ";

	$sentence = $connection->prepare($consulta);

	if(isset($_POST['crearestado'])){
		$id=htmlspecialchars($_POST['idEstado']);
		$estado=htmlspecialchars($_POST['nuevoEstado']);
		
		$sentence->bind_param('ss',$id,$estado);

		if(!$sentence->execute()){
            echo '<script language="Javascript"> 
                    alert("El id ya existe o no es valido");
                    </script>';
        }else{
		header('Location: mantenedor_estados_matricula.php');
	   }
	}

?>

<style type="text/css">
    
    body{
        font-family: arial;
    }
</style>

<h1> Backend Administrativo - Estados Matricula - Crear Nuevo Estado </h1>


<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <table>
    	<tr>
    		<td> Id:</td>
    		<td><input type='text' name='idEstado' required /></td>
    	</tr>
        <tr>
            <td>Estado: </td>
            <td><input type='text' name='nuevoEstado' required/></td>
        </tr>

    </table>
    
    <input type='hidden' name='crearest'/>
    <input type='submit' value='Crear Nuevo Estado'/>

</form>