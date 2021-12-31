<!--Consulta para actualizar datos del personal de la empresa-->
<?php
include ('../include/conexion.php');
$idusuario=$_POST['id_usuario'];
$apellido_paterno=utf8_decode(strtoupper($_POST['apellido_paterno']));
$apellido_materno=utf8_decode(strtoupper($_POST['apellido_materno']));
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$puesto=utf8_decode(strtoupper($_POST['puesto']));
$sexo=strtoupper($_POST['sexo']);
$correo=utf8_decode ($_POST['correo']);
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$password=$_POST['password'];
	if($password==NULL){
		//PASSWORD VACIO NO SE ACTUALIZA
		//Codigo para modificar la tabla tipo_usuario	
	    $sql="UPDATE usuario SET apellido_paterno= upper('$apellido_paterno'),apellido_materno= upper('$apellido_materno'),nombre= upper('$nombre'),puesto='$puesto',sexo='$sexo',correo='$correo',telefono='$telefono',direccion='$direccion' WHERE idusuario='$idusuario'";
	}	
	else{
		//SE ACTUALIZA EL PASSWORD
		$password=md5($password);
		//Codigo para modificar la tabla usuario con nuevo password y tipo_usuario	
		$sql="UPDATE usuario SET apellido_paterno= upper('$apellido_paterno'),apellido_materno= upper('$apellido_materno'),nombre= upper('$nombre'),puesto='$puesto',password='$password',sexo='$sexo',correo='$correo',telefono='$telefono',direccion='$direccion' WHERE idusuario='$idusuario'";		
	}
	if(mysql_query($sql)){
		//echo "almacenado con éxito";
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../superuser/personal_empresa.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../superuser/personal_empresa.php");
	}
?>
                            
