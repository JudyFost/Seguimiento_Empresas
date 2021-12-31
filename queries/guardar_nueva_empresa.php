<!--Consulta para guardar al nueva empresa-->
<?php
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Creación y comparación de variables en php y mysql
$idempresa=$_POST['idempresa'];
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$rfc=strtoupper($_POST['rfc']);
$razon_social=utf8_decode(strtoupper($_POST['razon_social']));
$tipo_sector=$_POST['tipo_sector'];
$giro_comercial=utf8_decode($_POST['giro_comercial']);
$tamanio=strtoupper($_POST['tamanio']);
$telefono=$_POST['telefono'];
$direccion=utf8_decode(strtoupper($_POST['direccion']));
$email=utf8_decode($_POST['email']);
$pagina_web=utf8_decode($_POST['pagina_web']);
//consulta para insertar datos ingresados en php y ponerlos en la tabla empresa de mysql
$sql="INSERT INTO empresa VALUES ('$idempresa', '$rfc', upper('$razon_social'), upper('$nombre'), '$tipo_sector', '$giro_comercial', '$tamanio', '$telefono', upper('$direccion'), '$email', '$pagina_web')";

	if(mysql_query($sql)){
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor Y, el cual mandara el siguiente mensaje: Usuario guardado correctamente
		$_SESSION['almacenado']="Y";
		header("Location: ../superuser/empresas_administrador.php");
	}
	else{
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor F, el cual mandara el siguiente mensaje: Dato dúplicado, Fallo al guardar a la nueva empresa !
		$_SESSION['almacenado']="F";
		header("Location: ../superuser/empresas_administrador.php");
	}
?>
