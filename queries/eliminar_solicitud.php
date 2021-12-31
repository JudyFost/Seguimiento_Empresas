<!--Consulta para eliminar solicitud-->
<?php
include ('../include/conexion.php');
$idsolicitud=$_POST['id_solicitud'];
	if($idsolicitud==NULL){
	$sql="DELETE FROM solicitud WHERE idsolicitud='$idsolicitud'";
	}	
	else{	
       $sql="DELETE FROM solicitud WHERE idsolicitud='$idsolicitud'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/solicitudes_administrador.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/solicitudes_administrador.php");
	}
?>