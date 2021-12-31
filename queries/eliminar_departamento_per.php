<!--Consulta para eliminar departamento-->
<?php
include ('../include/conexion.php');
$iddepartamento=$_POST['id_departamento'];
$nombre_departamento=$_POST['nombre_departamento'];
	if($nombre_departamento==NULL){
	$sql="DELETE FROM departamento WHERE iddepartamento='$iddepartamento'";
	}	
	else{	
       $sql="DELETE FROM departamento WHERE iddepartamento=='$iddepartamento'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/departamento_empresa.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/departamento_empresa.php");
	}
?>