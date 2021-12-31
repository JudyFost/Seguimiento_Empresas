<!--Consulta para eliminar materia-->
<?php
include ('../include/conexion.php');
$clave=$_POST['clave'];
$nombre=$_POST['nombre'];
	if($nombre==NULL){
	$sql="DELETE FROM materia WHERE clave='$clave'";
	}	
	else{	
       $sql="DELETE FROM materia WHERE clave=='$clave'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/materia_administrador.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/materia_administrador.php");
	}
?>