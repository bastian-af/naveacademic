<?php

	require_once('includes/db.php');

	
    if(isset($_GET['rut'])){
    	$rut = htmlspecialchars($_GET['rut']);
    }

    $result = $connection->query('SELECT * FROM Alumno WHERE rut="'.$rut.'" ');

    while($fila=$result->fetch_assoc()){
        $nombres=$fila['nombres'];
        $apaterno=$fila['apellido_paterno'];
        $amaterno=$fila['apellido_materno'];

    }

	
	$consulta = "UPDATE Alumno 	SET nombres= ?,  apellido_paterno= ?, apellido_materno= ?	WHERE rut= ? ";

	$sentencia = $connection->prepare($consulta);

	if(isset($_POST['Editardatos'])){
		$nombres=htmlspecialchars($_POST['nombres']);
		$ap_paterno=htmlspecialchars($_POST['apaterno']);
		$ap_materno=htmlspecialchars($_POST['amaterno']);
		$rut=htmlspecialchars($_POST['rut']);

		$sentencia->bind_param('ssss',$nombres,$ap_paterno,$ap_materno,$rut);
		$sentencia->execute();

		header('Location: mantenedor_alumnos.php');
	}


?> 

<h1> Backend Administrativo - Alumnos - <?php echo $rut; ?> </h1>

<style>

        body{
            font-family: arial;
        }
        </style>

<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    
    <p>RUT: <?php echo $rut; ?></p>

    <table>
    	    <tr>
            <td>Nombre: </td>
            <td><input type='text' name='nombres' value='<?php echo $nombres; ?>'  required/></td>
        </tr>
        <tr>
            <td>Apellido Paterno: </td>
            <td><input type='text' name='apaterno' value='<?php echo $apaterno; ?>' required/></td>
        </tr>
        <tr>
            <td>Apellido Materno: </td>
            <td><input type='text' name='amaterno' value='<?php echo $amaterno; ?>' required/></td>
        </tr>

    </table>
    </br>
    <input type='hidden' name='Editardatos'/>
    <input type='submit' value='Actualizar Datos'/>

</form>
