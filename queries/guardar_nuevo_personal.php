<!--Consulta para guardar al nuevo usuario (personal de la empresa) para usar sus datos en el formulario solicitudes-->
<?php
include ('../include/conexion.php');
$idusuario=$_POST['idusuario'];
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$apellido_paterno=utf8_decode(strtoupper($_POST['apellido_paterno']));
$apellido_materno=utf8_decode(strtoupper($_POST['apellido_materno']));
$tipo_usuario=$_POST['tipo_usuario'];
$password=md5($_POST['password']);
$puesto=strtoupper($_POST['puesto']);
$sexo=strtoupper($_POST['sexo']);
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$direccion=utf8_decode(strtoupper($_POST['direccion']));

$sql="INSERT INTO usuario VALUES ('$idusuario',upper('$nombre'),upper('$apellido_paterno'),upper('$apellido_materno'),4,'$password','$puesto','$sexo','$correo','$telefono',upper('$direccion'));";
	if(mysql_query($sql)){
		//echo "almacenado con exito";
		session_start();
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/personal_empresa.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/personal_empresa.php");
	}
?>
