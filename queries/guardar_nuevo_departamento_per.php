<?php
include ('../include/conexion.php');
$idempresa=$_POST['idempresa'];
$nombre_departamento=utf8_decode(strtoupper($_POST['nombre_departamento']));
$idusuario=$_POST['idusuario'];

$sql="INSERT INTO departamento (iddepartamento, empresa_idempresa, usuario_idusuario, nombre_departamento) VALUES ('$idepartamento', '$idempresa', '$idusuario', upper('$nombre_departamento'))";
//echo $sql;
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/departamento_personal.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/departamento_personal.php");
	}

?>
