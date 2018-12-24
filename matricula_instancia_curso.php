<?php

	require_once('includes/db.php');

	if(isset($_GET['sigla'])){
		if(isset($_COOKIE['sigla'])){
			unset($_COOKIE['sigla']);
			unset($_COOKIE['agno']);
			unset($_COOKIE['semestre']);
		}
    	$sigla = htmlspecialchars($_GET['sigla']);
    	$agno=htmlspecialchars($_GET['agno']);
		$semestre=htmlspecialchars($_GET['semestre']);
		setcookie("sigla",$sigla,0);
		setcookie("agno",$agno,0);
		setcookie("semestre",$semestre,0);
    }else{
    	$sigla = $_COOKIE['sigla'];
    	$agno=$_COOKIE['agno'];
		$semestre=$_COOKIE['semestre'];
    }

    $result=$connection->query('SELECT * FROM Curso WHERE sigla="'.$sigla.'"');

    while ($fila = $result->fetch_assoc()) {
    	$mostrar=$sigla;
    	$mostrar.=' ';
    	$mostrar.=$fila['nombre'];
    }



	$consulta= "SELECT A.rut, A.nombres, A.apellido_paterno, A.apellido_materno FROM Alumno A 
					WHERE A.rut NOT IN
						(SELECT A.rut
						FROM Alumno A
						JOIN MatriculaInstanciaCurso M ON A.rut = M.rut
						WHERE M.sigla ='".$sigla."'
						AND M.agno ='".$agno."'
						AND M.semestre ='".$semestre."')
						";
	$result=$connection->query($consulta);
	$ASinMatricula="";
	while($fila=$result->fetch_assoc()){
		$ASinMatricula.="<option name=".$fila['rut']." value=".$fila['rut'].">".$fila['apellido_paterno']." ".$fila['apellido_materno']." ".$fila['nombres']." </option>";
	}


	$consulta1='SELECT * FROM EstadoMatricula';
	$result1=$connection->query($consulta1); 
	$Estados="";
	while($fila1=$result1->fetch_assoc()){
		$Estados.='<option value='.$fila1['id'].' name='.$fila1['id'].' >'.$fila1['estado'].' </option>';
	}



	$consulta2="SELECT A.rut, A.nombres, A.apellido_paterno, A.apellido_materno, E.estado 
				FROM Alumno A
				JOIN MatriculaInstanciaCurso M ON A.rut = M.rut
				JOIN EstadoMatricula E ON E.id = M.estado
				AND M.agno ='".$agno."'
				AND M.semestre ='".$semestre."'
				";
	$result2=$connection->query($consulta2);
	$AlumnosMat="";
	while($fila2=$result2->fetch_assoc()){
		$AlumnosMat.="<tr id='tor'>
						<td id='tod'><input type='checkbox' name='alumnos[]' id=".$fila2['rut']." value=".$fila2['rut']." </td>
						<td id='tod'>".$fila2['rut']."</td>
						<td id='tod'>".$fila2['apellido_paterno']."</td>
						<td id='tod'>".$fila2['apellido_materno']."</td>
						<td id='tod'>".$fila2['nombres']."</td>
						<td id='tod'>".$fila2['estado']."</td>
						<td id='tod'><a href='desmatricular_alumno.php?rut=".$fila2['rut']."&sigla=".$sigla."&agno=".$agno."&semestre=".$semestre."'>Desmatricular</a></td>
						</tr id='tor'>";
	}


	if(isset($_POST['matricularalumno'])){

			$rut=$_POST['alumno'];
			$matricular="INSERT INTO MatriculaInstanciaCurso(sigla,agno,semestre,rut,estado) 	VALUES (?,?,?,?,1)";
			$sentencia=$connection->prepare($matricular);
			$sentencia->bind_param('ssss',$sigla,$agno,$semestre,$rut);
			$sentencia->execute();

			header("Location: matricula_instancia_curso.php");
	}

	if(isset($_POST['cambiarestado'])){
		$cambiar="UPDATE MatriculaInstanciaCurso
					SET estado=?
					WHERE rut=?";
		$sentencia1=$connection->prepare($cambiar);
		foreach($_POST['alumnos'] as $rut){
			$sentencia1->bind_param('ss',$_POST['estado'],$rut);
			$sentencia1->execute();
		}
		header("Location: matricula_instancia_curso.php");
	}

?>

<h1> Backend Adminstrativo - Cursos - <?php echo $mostrar; ?> </h1>

<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <table>
    	<tr>
    		<td>
    			<input type='hidden' name='matricularalumno'/>
 			    <input type='submit' value='Matricular Alumno'/>
 			</td>
 			<td> <select name='alumno' required>
 				<option selected disabled> Seleccione Alumno </option>
 				<?php echo $ASinMatricula; ?>
 				</select>
 			</td>
    	</tr>
        

    </table>
</form>

<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>

    <table>
    	<tr>
    		<td> Cambiar estados Alumnos Seleccionados a: </td>
 			<td> <select name='estado' required>
 				<option selected disabled>Seleccione Estado </option>
 				<?php echo $Estados; ?>
 				</select>
 			</td>
 			<td>
    			<input type='hidden' name='cambiarestado'/>
 			    <input type='submit' value='Cambiar Estados'/>
 			</td>
    	</tr>
    </table>
    <br/>
    <br/>
    <table>
    	<tr id="tor">
    		<th id="top"> </th>
    		<th id="top">Rut </th>
    		<th id="top">Apellido Paterno </th>
    		<th id="top">Apellido Materno </th>
    		<th id="top">Nombres </th>
    		<th id="top">Estado </th>
    		<th id="top"> </th>
    	</tr id="tor">
    	 <?php echo $AlumnosMat; ?>
    </table>
</form>

<style>
	body{
		font-family: arial;
	}
	
	table{
	  	margin: 5px;
	  	padding: 5px;
	  	border-collapse: collapse;
	}
	#tod, #tor, #top{
		border: black 2px solid;
		text-align:center;
	}
	#top{
		
		background:  #34495e;
		color: white;
	}
	#tor, #tod{
		background:  #16a085;
		color: white;
	}
	button{
		background: green;
	}
</style>
