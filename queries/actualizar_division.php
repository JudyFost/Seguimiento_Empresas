<!--Consulta para actualizar datos de la division-->
<?php
include ('../include/conexion.php');
$idcarrera=$_POST['idcarrera'];
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$sql="UPDATE carrera SET nombre='$nombre' WHERE idcarrera='$idcarrera';";

	if(mysql_query($sql)){
		//echo "almacenado con éxito";
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/division_administrador.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/division_administrador.php");
	}
?>
                            
