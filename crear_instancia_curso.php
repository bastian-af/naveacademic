<?php

	
	require_once('includes/db.php');

    if(isset($_GET['sigla'])){
        $sigla = htmlspecialchars($_GET['sigla']);
    }else{
        $sigla = htmlspecialchars($_POST['sigla']);
    }

	$consulta = "INSERT INTO InstanciaCurso(sigla_curso,agno,semestre) VALUES (?,?,?) ";
	$Sentence = $connection->prepare($consulta);

	if(isset($_POST['crearinstancia'])){
		$agno=htmlspecialchars($_POST['agno']);
		$semestre=htmlspecialchars($_POST['semestre']);
        $sigla=htmlspecialchars($_POST['sigla']);
		

		$Sentence->bind_param('sii',$sigla,$agno,$semestre);

		if(!$Sentence->execute()){
            echo '<script language="Javascript"> 
                    alert("Error --> Datos no validos");
                    </script>';
        }else{
		header("Location: instancias_curso.php?sigla=".$sigla."" );
	   }
	}

?>

<h1> Backend Administrativo - Instancias Curso - Crear Nuevo </h1>


<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <table>
    	<tr>
    		<td>Sigla:</td>
    		<td><input type='text' name='sigla' required readonly value='<?php echo $sigla; ?>'/></td>
    	</tr>
        <tr>
            <td>Año: </td>
            <td><select name='agno' required >
                <option> <?php echo date("Y")-2 ?></option>
                <option> <?php echo date("Y")-1 ?></option>
                <option> <?php echo date("Y") ?></option>
                <option> <?php echo date("Y")+1 ?></option>
                <option> <?php echo date("Y")+2 ?></option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Semestre: </td>
            <td><input type='radio' name='semestre' value='1' required/>Primer Semestre</td>
        </tr>
        <tr>
            <td> </td>
            <td><input type='radio' name='semestre' value='2' required/>Segundo Semestre</td>
        </tr>

    </table>
    
    <input type='hidden' name='crearinstancia'/>
    <input type='submit' value='Crear Instancia Curso'/>

</form>