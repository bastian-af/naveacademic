<?php

	require_once('includes/db.php');
	
	$id=htmlspecialchars($_GET['id']);

	$consultasql = "DELETE FROM EstadoMatricula WHERE id= ?";
	$sentence= $connection->prepare($consultasql);
	$sentence->bind_param('s',$id);
	$sentence->execute();

	header('Location: mantenedor_estados_matricula.php');

?>