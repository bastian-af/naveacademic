<?php
	require_once ( 'includes/db.php' );

		$rutAlumno='"12345678";INSERT INTO Alumno (rut,nombres,apellido_paterno,apellido_materno) VALUES ("2222222","Juan","Carlos","Bodoque");';
/*$_GET [ 'rut' ]*/ 

	$sqlStr = "SELECT * FROM Alumno WHERE rut = '" .$rutAlumno . "'";
	$result = $connection -> query ( $sqlStr ) or die ( $connection -> error );
	while ( $fila = $result -> fetch_assoc ()) {
		print_r ( $fila );
		echo "<br/>";
	}
?>

