<!--Consulta para guardar al nuevo usuario alumno-->
<?php
//Este código manda llamar al archivo conexion.php (El cuál contiene la conexion de la base de datos)
include ('../include/conexion.php');
//Creación y comparación de variables en php y mysql
$idusuario=$_POST['idusuario'];
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$ap_paterno=utf8_decode(strtoupper($_POST['ap_paterno']));
$ap_materno=utf8_decode(strtoupper($_POST['ap_materno']));
$tipo_usuario=$_POST['tipo_usuario'];
$password=md5($_POST['password']);
$puesto=strtoupper($_POST['puesto']);
$sexo=strtoupper($_POST['sexo']);
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$direccion=utf8_decode(strtoupper($_POST['direccion']));
//Aquì se manda a llamar a la consulta usuario de la base de datos seguimiento_empresas para insertar los datos en esta base de datos y estos puedan ser visualizados en el sistema web (Agenda Empresarial para el TESJo)
$sql="INSERT INTO usuario VALUES ('$idusuario',upper('$nombre'),upper('$ap_paterno'),upper('$ap_materno'),$tipo_usuario,'$password','$puesto','$sexo','$correo','$telefono',upper('$direccion'));";
	if(mysql_query($sql)){
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquì se manda a llamar la variable de sesión con el valor Y, el cual mandara el siguiente mensaje: Alumno guardado correctamente
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/alumnos_administrador.php");
	}
	else{
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquì se manda a llamar la variable de sesión con el valor F, el cual mandara el siguiente mensaje: ¡ Dato dúplicado, Fallo al guardar al nuevo usuario !
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/alumnos_administrador.php");
	}
?>


