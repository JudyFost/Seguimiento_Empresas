<!--Consulta para eliminar departamento-->
<?php
include ('../include/conexion.php');
$iddepartamento=$_POST['iddepartamento'];
$idempresa=$_POST['idempresa'];
$idusuario=$_POST['idusuario'];
$nombre_departamento=$_POST['nombre_departamento'];

$sql="UPDATE `seguimiento_empresas`.`departamento` SET `iddepartamento`='$iddepartamento', `empresa_idempresa`='$idempresa', `usuario_idusuario`='$idusuario', `nombre_departamento`='$nombre_departamento' WHERE `iddepartamento`='$iddepartamento';";

	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/responsable_administrador.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/responsable_administrador.php");
	}
?>
                            
