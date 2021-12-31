<!--Consulta para actualizar datos de la empresa-->
<?php
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Creación y comparación de variables en php y mysql
$idempresa=$_POST['id_empresa'];
$rfc=strtoupper($_POST['rfc']);
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$razon_social=utf8_decode(strtoupper($_POST['razon_social']));
$idsector="idsector_actualizar_".$idempresa;
$idsector=$_POST[$idsector];
$idgiro="idgiro_actualizar_".$idempresa;
$idgiro=$_POST[$idgiro];
$tamanio=strtoupper($_POST['tamanio']);
$telefono=$_POST['telefono'];
$direccion=utf8_decode(strtoupper($_POST['direccion']));
$email=utf8_decode($_POST['email']);
$pagina_web=utf8_decode($_POST['pagina_web']);
//consulta para actualizar los datos ingresados de php y así poder modificarlos en la tabla empresa de mysql	
$sql="UPDATE empresa SET rfc='$rfc', razon_social='$razon_social', nombre='$nombre', tipo_sector=$idsector, giro_comercial='$idgiro', tamanio='$tamanio', telefono='$telefono', direccion='$direccion', email='$email', pagina_web='$pagina_web' WHERE idempresa='$idempresa';";		

	if(mysql_query($sql)){
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor A, el cual mandara el siguiente mensaje: Datos editados correctamente
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/empresas_administrador.php");
	}
	else{
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor B, el cual mandara el siguiente mensaje: Fallo al guardar la edicion de la empresa !
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/empresas_administrador.php");
	}
?>
                            
