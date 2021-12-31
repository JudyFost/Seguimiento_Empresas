<?php
include ('../include/conexion.php');
$idespecialidad=utf8_decode(strtoupper($_POST['idespecialidad']));
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$descripcion=utf8_decode(strtoupper($_POST['descripcion']));
$sql="INSERT INTO especialidad (idespecialidad,nombre,descripcion) VALUES (upper('$idespecialidad'),upper('$nombre'),upper('$descripcion'));";
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/especialidad_administrador.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/especialidad_administrador.php");
	}
?>