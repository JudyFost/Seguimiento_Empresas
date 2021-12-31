<?php
include ('../include/conexion.php');
$idcarrera=$_POST['idcarrera'];
$nombre_carrera=utf8_decode(strtoupper($_POST['nombre_carrera']));
$clave_carrera=strtoupper($_POST['clave_carrera']);
$idespecialidad=$_POST['idespecialidad'];

$sql="INSERT INTO carrera (idcarrera, clave_carrera, especialidad_idespecialidad, nombre) VALUES ('$idcarrera', '$clave_carrera', '$idespecialidad', upper('$nombre_carrera'));";

	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/division_administrador.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/division_administrador.php");
	}

?>
