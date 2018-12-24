<?php

	require_once('includes/db.php');
	
	$rut=htmlspecialchars($_GET['rut']);
	$sigla=htmlspecialchars($_GET['sigla']);
	$agno=htmlspecialchars($_GET['agno']);
	$semestre=htmlspecialchars($_GET['semestre']);

	$consulta = "DELETE FROM MatriculaInstanciaCurso
					WHERE rut= ? AND sigla=? AND agno=? AND semestre=?";

	$sentencia= $connection->prepare($consulta);
	$sentencia->bind_param('ssss',$rut,$sigla,$agno,$semestre);
	$sentencia->execute();

	header('Location: matricula_instancia_curso.php');

?>