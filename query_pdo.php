<?php
	require_once ( 'includes/db.php' );
	$consulta = 'SELECT * FROM Alumno WHERE rut = :rut' ;
	$sentence = $connection->prepare($consulta);

	$sentence->bindParam(':rut',$_GET [ 'rut' ], PDO::PARAM_STR);
	if ($sentencie->execute()){
  		while ($fila = $sentencie->fetchColumn()) {
    		print_r($fila);
    		echo "<br/>";
  		}
	}
?>