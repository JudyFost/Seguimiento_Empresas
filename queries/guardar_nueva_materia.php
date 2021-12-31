<?php
include ('../include/conexion.php');
$clave=$_POST['clave'];
$nombre=utf8_decode (strtoupper($_POST['nombre']));
$creditos=$_POST['creditos'];
$sql="INSERT INTO materia (clave,nombre,creditos) VALUES ('$clave',upper('$nombre'),'$creditos');";
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/materia_administrador.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/materia_administrador.php");
	}

?>
    
