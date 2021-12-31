<?php
session_start();
$iduser=$_POST["responsable"];
include ('../include/conexion.php');
$Lu="";
$Ma="";
$Mi="";
$Ju="";
$Vi="";
$Sa="";
$folio_siguiente=$_POST['folio_siguiente'];
$idtipo_solicitud=$_POST['idtipo_solicitud'];
$division=$_POST['division'];
$idespecialidad=$_POST['especialidad'];
$fecha_max=$_POST['fecha_max'];
$horario_inicio=$_POST['horario_inicio'];
$horario_fin=$_POST['horario_fin'];
if(isset($_POST['lu'])){
	$Lu=$_POST['lu'];
	}
	if(isset($_POST['ma'])){
	$Ma=$_POST['ma'];
	}
	if(isset($_POST['mi'])){
	$Mi=$_POST['mi'];
	}
	if(isset($_POST['ju'])){
	$Ju=$_POST['ju'];
	}
	if(isset($_POST['vi'])){
	$Vi=$_POST['vi'];
	}
	if(isset($_POST['sa'])){
	$Sa=$_POST['sa'];
	}
$dias=$Lu.$Ma.$Mi.$Ju.$Vi.$Sa;
date_default_timezone_set('UTC');
$fecha_hoy=date("Y-m-d");
//echo $fecha_hoy;
$nivel_ingles=strtoupper($_POST['nivel_ingles']);
$semestre=$_POST['semestre'];
$promedio=$_POST['promedio'];
$genero=strtoupper($_POST['genero']);
$beca=strtoupper($_POST['beca']);
$no_alumnos=$_POST['no_alumnos'];
$observaciones=$_POST['observaciones'];
$departamento=$_POST['departamento'];
$empresa=$_POST['empresa'];
$encargado=$_POST['encargado'];

$sql="INSERT INTO solicitud (idsolicitud, tipo_solicitud_idtipo_solicitud, status_solicitud_idstatus_solicitud, fecha_inicio, fecha_max, horario_inicio, horario_fin, dias, nivel_ingles, semestre, promedio, genero, beca, no_alumnos, observaciones, departamento_iddepartamento, departamento_empresa_idempresa, departamento_usuario_idusuario, carrera_idcarrera, carrera_especialidad_idespecialidad, idusuario) VALUES ($folio_siguiente, $idtipo_solicitud, 4, '$fecha_hoy', '$fecha_max', '$horario_inicio', '$horario_fin', '$dias', '$nivel_ingles', $semestre, $promedio, '$genero', '$beca', $no_alumnos, '$observaciones', $departamento, $empresa, '$iduser', $division, '$idespecialidad', '$encargado');";

echo 'sql:'.$sql;
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
