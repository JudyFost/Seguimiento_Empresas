<!--Consulta para actualizar datos del historial del alumno-->
<?php
include ('../include/conexion.php');
$idcontrol=$_POST['idcontrol'];
$semestre=strtoupper($_POST['semestre']);
$seguro_facultativo=utf8_decode(strtoupper($_POST['seguro_facultativo']));
$creditos_actuales=utf8_decode(strtoupper($_POST['creditos_actuales']));
$situacion_alumno_clave=utf8_decode(strtoupper($_POST['situacion_alumno_clave']));
$tipo_alumno_clave=utf8_decode(strtoupper($_POST['tipo_alumno_clave']));
$carrera_idcarrera=utf8_decode(strtoupper($_POST['carrera_idcarrera']));
$servicio_social=utf8_decode(strtoupper($_POST['servicio_social']));
$residencia_profesional=utf8_decode(strtoupper($_POST['residencia_profesional']));
$proyecto_dual=utf8_decode($_POST['proyecto_dual']);
	if($proyecto_dual==NULL){
	    $sql="UPDATE alumno SET semestre='$semestre', seguro_facultativo='$seguro_facultativo', creditos_actuales='$creditos_actuales', situacion_alumno_clave='$situacion_alumno_clave', tipo_alumno_clave='$tipo_alumno_clave', carrera_idcarrera='$carrera_idcarrera', servicio_social='$servicio_social', residencia_profesional='$residencia_profesional', proyecto_dual='$proyecto_dual' WHERE idcontrol='$idcontrol';";
	}	
	else{	
	    $sql="UPDATE alumno SET semestre='$semestre', seguro_facultativo='$seguro_facultativo', creditos_actuales='$creditos_actuales', situacion_alumno_clave='$situacion_alumno_clave', tipo_alumno_clave='$tipo_alumno_clave', carrera_idcarrera='$carrera_idcarrera', servicio_social='$servicio_social', residencia_profesional='$residencia_profesional', proyecto_dual='$proyecto_dual' WHERE idcontrol='$idcontrol';";
	}
	//echo $sql;
	if(mysql_query($sql)){
		//echo "almacenado con éxito";
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/historial_alumno.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/historial_alumno.php");
	}
?>
                            
