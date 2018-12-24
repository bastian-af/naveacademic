<?php

	require_once('includes/db.php');
	
	$sigla=htmlspecialchars($_GET['sigla']);
	$agno=htmlspecialchars($_GET['agno']);
	$semestre=htmlspecialchars($_GET['semestre']);

	$consulta = "DELETE FROM InstanciaCurso WHERE sigla_curso=? AND agno=? AND semestre=? ";
	$sentence= $connection->prepare($consulta);
	$sentence->bind_param('sii',$sigla,$agno,$semestre);
	$sentence->execute();

	header("Location: instancias_curso.php?sigla=".$sigla."");

?>