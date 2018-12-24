<?php

	require_once('includes/db.php');

	$consulta = "INSERT INTO Alumno (nombres,rut,apellido_paterno,apellido_materno)	VALUES (?,?,?,?) ";

	$sentence = $connection->prepare($consulta);

	if(isset($_POST['Crearalumno'])){

		$nombres=htmlspecialchars($_POST['nombres']);
		$apaterno=htmlspecialchars($_POST['apaterno']);
		$amaterno=htmlspecialchars($_POST['amaterno']);
		$rut=htmlspecialchars($_POST['rut']);

		$sentence->bind_param('ssss',$nombres,$rut,$apaterno,$amaterno);

		if(!$sentence->execute()){
            echo '<script language="Javascript"> 
                    alert("El rut ingresado no es valido o ya se encuentra en la base de datos ! ");
                    </script>';
        }else{
        header('Location: mantenedor_alumnos.php');
       }
	}

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
<h1> Backend Administrativo - Alumnos - Crear Nuevo </h1>

        <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <table>
            	<tr>
            		<td> Rut:</td>
            		<td><input type='text' name='rut' required /></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type='text' name='nombres'/></td>
                </tr>
                <tr>
                    <td>Apellido Paterno: </td>
                    <td><input type='text' name='apaterno'/></td>
                </tr>
                <tr>
                    <td>Apellido Materno: </td>
                    <td><input type='text' name='amaterno'/></td>
                </tr>

            </table>
            
            <input type='hidden' name='Crearalumno'/>
            <input type='submit' value='Crear Alumno'/>

        </form>
    </body>
</html>