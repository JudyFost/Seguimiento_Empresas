<?php
include ('../include/conexion.php');
$idsolicitud=$_POST['idsolicitud'];
$tipo_solicitud=strtoupper($_POST['tipo_solicitud']);
$genero=strtoupper($_POST['genero']);
$iddivision="iddivision_actualizar_".$idsolicitud;
$iddivision=$_POST[$iddivision];
$idespecialidad="idespecialidad_actualizar_".$idsolicitud;
$idespecialidad=$_POST[$idespecialidad];
$fecha_max=$_POST['fecha_max'];
$horario_inicio=$_POST['horario_inicio'];
$horario_fin=$_POST['horario_fin'];
$semestre=$_POST['semestre'];
$nivel_ingles=$_POST['nivel_ingles'];

$sql="UPDATE solicitud SET tipo_solicitud_idtipo_solicitud=$tipo_solicitud,genero='$genero',carrera_idcarrera=$iddivision, carrera_especialidad_idespecialidad='$idespecialidad',fecha_max='$fecha_max',horario_inicio='$horario_inicio',horario_fin='$horario_fin',semestre=$semestre,nivel_ingles='$nivel_ingles' WHERE idsolicitud=$idsolicitud;";
	if(mysql_query($sql)){
         echo($sql);
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="A";
	    header("Location: ../business/solicitud_empresa.php");
	}
	else{
		//echo "fracaso";
		echo ".$sql";
		session_start();
		$_SESSION['almacenado']="B";
	    header("Location: ../business/solicitud_empresa.php");
	}

?>

