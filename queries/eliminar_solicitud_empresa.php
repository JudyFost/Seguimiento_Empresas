<!--Consulta para eliminar solicitud (Empresa)-->
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
		header("Location: ../business/solicitud_empresa.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../business/solicitud_empresa.php");
	}
?>