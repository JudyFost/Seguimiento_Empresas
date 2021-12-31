<!--Consulta para eliminar personal empresa-->
<?php
//Código para mandar llamar el archivo conexion.php que se encuentra dentro de la carpeta include y que la conexion a la base de datos
include ('../include/conexion.php');
$idusuario=$_POST['idusuario'];
$password=$_POST['password'];
	if($password==NULL){
	$sql="DELETE FROM usuario WHERE idusuario='$idusuario'";
	}	
	else{
	   $password=md5($password);	
       $sql="DELETE FROM usuario WHERE idusuario='$idusuario'";
		}
	if(mysql_query($sql)){
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor E, el cual mandara el siguiente mensaje: Usuario eliminado correctamente
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/personal_empresa.php");
	}
	else{
		//Código para iniciar una nueva sesión o reanudar la existente
		session_start();
		//Aquí se manda a llamar la variable de sesión con el valor N, el cual mandara el siguiente mensaje: ¡ Este usuario tiene datos en el sistema y por lo tanto no se puede eliminar !
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/personal_empresa.php");
	}
?>
                            
