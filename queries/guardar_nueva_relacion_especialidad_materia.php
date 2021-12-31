<?php
include ('../include/conexion.php');
$idespecialidad=$_POST['especialidad'];
$clave_materia=strtoupper($_POST['clave']);

$sql="INSERT INTO especialidad_materia (especialidad_idespecialidad, materia_clave) VALUES ('$idespecialidad', '$clave_materia');";

	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/especialidad_materia.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/especialidad_materia.php");
	}

?>
    
