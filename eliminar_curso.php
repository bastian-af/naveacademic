<?php

	require_once('includes/db.php');
	
	$sigla=htmlspecialchars($_GET['sigla']);

	$consultaSQL = "DELETE FROM Curso WHERE sigla= ?";

	$sentence= $connection->prepare($consultaSQL);
	$sentence->bind_param('s',$sigla);
	$sentence->execute();

	header('Location: mantenedor_cursos.php');

?>