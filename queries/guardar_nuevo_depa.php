<?php
//Este código manda llamar al archivo conexion.php (El cuál contiene la conexion de la base de datos)
include ('../include/conexion.php');
$idempresa=$_POST['idempresa'];
$nombre_departamento=utf8_decode(strtoupper($_POST['nombre_departamento']));
$idusuario=$_POST['idusuario'];
//Aquí se manda a llamar a la consulta departamento de la base de datos seguimiento_empresas para insertar los datos en esta base de datos y estos puedan ser visualizados en el sistema web (Agenda Empresarial para el TESJo)
$sql="INSERT INTO departamento (iddepartamento, empresa_idempresa, usuario_idusuario, nombre_departamento) VALUES ('$idepartamento', '$idempresa', '$idusuario', upper('$nombre_departamento'))";
	if(mysql_query($sql)){
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor Y, el cual mandara el siguiente mensaje: Departamento guardado correctamente
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/departamento_empresa.php");
	}
	else{
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor F, el cual mandara el siguiente mensaje: Fallo al guardar al nuevo departamento!
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/departamento_empresa.php");
	}

?>
