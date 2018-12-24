<?php
	require_once ( 'includes/db.php' );

	$sqlStr = "SELECT * FROM Alumno WHERE rut = '" .$_GET [ 'rut' ]. "'";
	$result = $connection -> query ( $sqlStr ) or die ( $connection -> error );
	while ( $fila = $result -> fetch_assoc ()) {
		print_r ( $fila );
		echo "<br/>";
	}
?>

