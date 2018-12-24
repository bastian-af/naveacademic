<?php
	require_once ( 'includes/db.php' );

	/*$rutAlumno = $_GET [ 'rut' ];*/


	echo("").$rutAlumno;

	if($consulta=mysqli_prepare($connection,"SELECT * FROM Alumno WHERE rut=?")){
		  mysqli_stmt_bind_param($consulta,"s", $rutAlumno);
		  mysqli_stmt_execute($consulta);
		  mysqli_stmt_bind_result($consulta, $f1,$f2,$f3,$f4);
		  mysqli_stmt_fetch($consulta);
		  printf("rut: ".$f1." nombres: ".$f2." apellido_paterno: ".$f3." apellido_materno: ".$f4);
		}
	
   /* cerrar sentencia 
    mysqli_stmt_close($consulta);*/
?>