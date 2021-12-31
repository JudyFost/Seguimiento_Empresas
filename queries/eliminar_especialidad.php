<!--Consulta para eliminar especialidad-->
<?php
include ('../include/conexion.php');
$idespecialidad=$_POST['idespecialidad'];
$nombre=$_POST['nombre'];
	if($nombre==NULL){
	$sql="DELETE FROM especialidad WHERE idespecialidad='$idespecialidad'";
	}	
	else{	
       $sql="DELETE FROM especialidad WHERE idespecialidad=='$idespecialidad'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/especialidad_administrador.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/especialidad_administrador.php");
	}
?>