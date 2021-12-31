<!--Consulta para guardar al nuevo historial-->
<?php
include ('../include/conexion.php');
$idcontrol=$_POST['idcontrol'];
$usuario_idusuario=$_POST['usuario_idusuario'];
$semestre=$_POST['semestre'];
$seguro_facultativo=$_POST['seguro_facultativo'];
$creditos_actuales=strtoupper($_POST['creditos_actuales']);
$situacion_alumno_clave=$_POST['situacion_alumno_clave'];
$tipo_alumno_clave=utf8_decode($_POST['tipo_alumno_clave']);
$carrera_idcarrera=strtoupper($_POST['carrera_idcarrera']);
$servicio_social=$_POST['servicio_social'];
$residencia_profesional=$_POST['residencia_profesional'];
$proyecto_dual=$_POST['proyecto_dual'];

$sql="INSERT INTO alumno VALUES ('$idcontrol', '$usuario_idusuario', '$semestre', '$seguro_facultativo', '$creditos_actuales', '$situacion_alumno_clave', '$tipo_alumno_clave', '$carrera_idcarrera', '$servicio_social', '$residencia_profesional', '$proyecto_dual')";
    //echo $sql;
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/historial_alumno.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/historial_alumno.php");
	}
?>
