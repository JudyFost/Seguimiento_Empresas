<!--Consulta para eliminar division-->
<?php
include ('../include/conexion.php');
$idcarrera=$_POST['idcarrera'];
$nombre=$_POST['nombre'];
	if($nombre==NULL){
	$sql="DELETE FROM carrera WHERE idcarrera='$idcarrera'";
	}	
	else{	
       $sql="DELETE FROM carrera WHERE idcarrera=='$idcarrera'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/division_administrador.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/division_administrador.php");
	}
?>