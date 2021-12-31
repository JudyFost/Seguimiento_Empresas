<!--Consulta para eliminar empresas-->
<?php
include ('../include/conexion.php');
$idempresa=$_POST['id_empresa'];
$nombre=$_POST['nombre'];
	if($nombre==NULL){
	$sql="DELETE FROM empresa WHERE idempresa='$idempresa'";
	}	
	else{	
       $sql="DELETE FROM empresa WHERE idempresa='$idempresa'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/empresas_administrador.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/empresas_administrador.php");
	}
?>