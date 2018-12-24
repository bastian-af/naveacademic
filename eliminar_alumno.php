<?php

	require_once('includes/db.php');
	
	$rut=htmlspecialchars($_GET['rut']);

	$consultaSQL = "DELETE FROM Alumno
					WHERE rut= ?";

	$sentence= $connection->prepare($consultaSQL);
	$sentence->bind_param('s',$rut);
	$sentence->execute();

	header('Location: mantenedor_alumnos.php');

?>