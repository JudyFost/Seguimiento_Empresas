<?php
include ('../include/conexion.php');
$idespecialidad=strtoupper($_POST['idespecialidad']);
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$descripcion=utf8_decode(strtoupper($_POST['descripcion']));
$sql="UPDATE especialidad SET nombre= upper('$nombre'), descripcion= upper('$descripcion') WHERE idespecialidad='$idespecialidad';";
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/especialidad_administrador.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/especialidad_administrador.php");
	}

?>
    
    
