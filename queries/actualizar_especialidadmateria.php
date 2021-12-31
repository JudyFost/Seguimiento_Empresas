<?php
include ('../include/conexion.php');
$idespecialidad_materia=$_POST['idespecialidad_materia'];
$idespecialidad=strtoupper($_POST['idespecialidad']);
$clave_materia=strtoupper($_POST['clave_materia']);

$sql="UPDATE `seguimiento_empresas`.`especialidad_materia` SET `idespecialidad_mat`='$idespecialidad_materia', `especialidad_idespecialidad`='$idespecialidad', `materia_clave`='$clave_materia' WHERE `idespecialidad_mat`='$idespecialidad_materia';";
	
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/especialidad_materia.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/especialidad_materia.php");
	}

?>
    
    
