<?php
include ('../include/conexion.php');
$idsolicitud=$_POST['idsolicitud'];
$status_solicitud=$_POST['status_solicitud'];
$observaciones=strtoupper($_POST['observaciones']);
$sql="UPDATE solicitud SET status_solicitud_idstatus_solicitud=$status_solicitud,observaciones='$observaciones' WHERE idsolicitud=$idsolicitud;";
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../business/solicitud_empresa.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../business/solicitud_empresa.php");
	}

?>
    
    
                            
