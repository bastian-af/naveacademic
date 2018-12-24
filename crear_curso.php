<?php

	
	require_once('includes/db.php');

	$consulta = "INSERT INTO Curso(sigla,nombre,descripcion) VALUES (?,?,?) ";
	$sentencia = $connection->prepare($consulta);

	if(isset($_POST['crearcurso'])){
		$sigla=htmlspecialchars($_POST['sigla']);
		$nombre=htmlspecialchars($_POST['nombre']);
		$descripcion=htmlspecialchars($_POST['descripcion']);
		$sentencia->bind_param('sss',$sigla,$nombre,$descripcion);

		if(!$sentencia->execute()){
            echo '<script language="Javascript"> 
                    alert("La sigla ya esta en la base de datos");
                    </script>';
        }else{
		header('Location: mantenedor_cursos.php');
	   }
    }

?>

<h1> Backend Administrativo - Cursos - Crear Nuevo </h1>


<form method='POST' id='crear' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <table>
    	<tr>
    		<td> Sigla:</td>
    		<td><input type='text' name='sigla' required /></td>
    	</tr>
        <tr>
            <td> Nombre: </td>
            <td><input type='text' name='nombre' required /></td>
        </tr>
        <tr>
            <td> Descripcion: </td>
            <td><textarea rows='10' cols= '19' name='descripcion' form='crear' required> </textarea></td>
        </tr>

    </table>
    
    <input type='hidden' name='crearcurso'/>
    <input type='submit' value='Crear Curso'/>

</form>