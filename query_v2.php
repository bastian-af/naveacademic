<?php
	require_once ( 'includes/db.php' );

$rutAlumno = mysqli_real_escape_string($connection, $_GET [ 'rut' ] );

	$sqlStr = "SELECT * FROM Alumno WHERE rut = '" . $rutAlumno . "'";
	$result = $connection -> query ( $sqlStr ) or die ( $connection -> error );

	while ( $fila = $result -> fetch_assoc ()) {
		print_r ( $fila );
		echo "<br/>";
	}
?>