<!--Consulta para actualizar datos de los alumnos-->
<?php
include ('../include/conexion.php');
$idusuario=$_POST['id_usuario'];
$ap_paterno=utf8_decode(strtoupper($_POST['ap_paterno']));
$ap_materno=utf8_decode(strtoupper($_POST['ap_materno']));
$nombre=utf8_decode(strtoupper($_POST['nombre']));
$puesto=utf8_decode(strtoupper($_POST['puesto']));
$sexo=strtoupper($_POST['sexo']);
$correo=utf8_decode ($_POST['correo']);
$telefono=$_POST['telefono'];
$direccion=utf8_decode($_POST['direccion']);
$password=$_POST['password'];
	if($password==NULL){
		//PASSWORD VACIO NO SE ACTUALIZA
		//Codigo para modificar la tabla tipo_usuario	
	    $sql="UPDATE usuario SET ap_paterno= upper('$ap_paterno'),ap_materno= upper('$ap_materno'),nombre= upper('$nombre'),puesto='$puesto',sexo='$sexo',correo='$correo',telefono='$telefono',direccion=upper('$direccion') WHERE idusuario='$idusuario'";
	}	
	else{
		//SE ACTUALIZA EL PASSWORD
		$password=md5($password);
		//Codigo para modificar la tabla usuario con nuevo password y tipo_usuario	
		$sql="UPDATE usuario SET ap_paterno= upper('$ap_paterno'),ap_materno= upper('$ap_materno'),nombre= upper('$nombre'),puesto='$puesto',password='$password',sexo='$sexo',correo='$correo',telefono='$telefono',direccion=upper('$direccion') WHERE idusuario='$idusuario'";		
	}
	if(mysql_query($sql)){
		//echo "almacenado con éxito";
		session_start();
		$_SESSION['almacenado']="A";
		header("Location: ../students/solicitud_alumno.php");
	}
	else{
		//echo "fracaso :-(";
		session_start();
		$_SESSION['almacenado']="B";
		header("Location: ../students/solicitud_alumno.php");
	}
?>
                            


