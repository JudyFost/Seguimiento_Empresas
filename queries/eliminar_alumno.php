<!--Consulta para eliminar usuario alumno-->
<?php
include ('../include/conexion.php');
$idusuario=$_POST['id_usuario'];
$puesto=strtoupper($_POST['puesto']);
$password=$_POST['password'];
	if($password==NULL){
	$sql="DELETE FROM usuario WHERE idusuario='$idusuario'";
	}	
	else{
		$password=md5($password);	
       $sql="DELETE FROM usuario WHERE idusuario='$idusuario'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/alumnos_administrador.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/alumnos_administrador.php");
	}
?>
                            
