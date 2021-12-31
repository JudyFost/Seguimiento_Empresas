<?php
include ('../include/conexion.php');
$clave=strtoupper($_POST['clave']);
$nombre=utf8_decode (strtoupper($_POST['nombre']));
$creditos=$_POST['creditos'];
$sql="UPDATE materia SET nombre= upper('$nombre'),creditos='$creditos' WHERE clave='$clave';";
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/materia_administrador.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/materia_administrador.php");
	}
?>
    
