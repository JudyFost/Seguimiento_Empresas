<!--Consulta para eliminar historial alumno-->
<?php
include ('../include/conexion.php');
$idcontrol=$_POST['idcontrol'];
	if($usuario_idusuario==NULL){
	$sql="DELETE FROM alumno WHERE idcontrol='$idcontrol'";
	}	
	else{	
       $sql="DELETE FROM alumno WHERE idcontrol='$idcontrol'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/historial_alumno.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/historial_alumno.php");
	}
?>