<!--Consulta para guardar una nueva solicitud-->
<?php
//Código para iniciar una nueva sesión o reanudar la existente
session_start();
$iduser=$_POST["responsable"];
//Este código manda llamar al archivo conexion.php (El cuál contiene la conexion de la base de datos)
include ('../include/conexion.php');
//Creación y comparación de variables en php y mysql
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
$encargado=$_POST["encargado"];


//Aquí se manda a llamar a la consulta solicitud de la base de datos seguimiento_empresas para insertar los datos en esta base de datos y estos puedan ser visualizados en el sistema web (Agenda Empresarial para el TESJo)
$sql="INSERT INTO solicitud (idsolicitud, tipo_solicitud_idtipo_solicitud, status_solicitud_idstatus_solicitud, fecha_inicio, fecha_max, horario_inicio, horario_fin, dias, nivel_ingles, semestre, promedio, genero, beca, no_alumnos, observaciones, departamento_iddepartamento, departamento_empresa_idempresa, departamento_usuario_idusuario, carrera_idcarrera, carrera_especialidad_idespecialidad, idusuario) VALUES ($folio_siguiente, $idtipo_solicitud, 4, '$fecha_hoy', '$fecha_max', '$horario_inicio', '$horario_fin', '$dias', '$nivel_ingles', $semestre, $promedio, '$genero', '$beca', $no_alumnos, '$observaciones', $departamento, $empresa, '$iduser', $division, '$idespecialidad', '$encargado');";
//$sql="INSERT INTO solicitud (idsolicitud, tipo_solicitud_idtipo_solicitud, status_solicitud_idstatus_solicitud, fecha_inicio, fecha_max, horario_inicio, horario_fin, dias, nivel_ingles, semestre, promedio, genero, beca, no_alumnos, observaciones, departamento_iddepartamento, departamento_empresa_idempresa, departamento_usuario_idusuario, carrera_idcarrera, carrera_especialidad_idespecialidad, responsable_sol) VALUES ($folio_siguiente, $idtipo_solicitud, 4, '$fecha_hoy', '$fecha_max', '$horario_inicio', '$horario_fin', '$dias', '$nivel_ingles', $semestre, $promedio, '$genero', '$beca', $no_alumnos, '$observaciones', $departamento, $empresa, '$iduser', $division, '$idespecialidad', '$encargado');";

//echo 'sql:'.$sql;
	if(mysql_query($sql)){
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor Y, el cual mandara el siguiente mensaje: Solicitud guardada correctamente
		$_SESSION['almacenado']="Y";
        header("Location: ../superuser/solicitudes_administrador.php");
	}
	else{
		//Código para iniciar una nueva sesión o reanudar la existente
        session_start();
		//Aquí se manda a llamar la variable de sesión con el valor F, el cual mandara el siguiente mensaje: Fallo al guardar nueva solicitud !
		$_SESSION['almacenado']="F";
		//echo ".$sql";
        header("Location: ../superuser/solicitudes_administrador.php");
	}
?>
