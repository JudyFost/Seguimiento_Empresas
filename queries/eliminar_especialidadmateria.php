<!--Consulta para eliminar especialidad-->
<?php
include ('../include/conexion.php');
$idespecialidad_materia=$_POST['idespecialidad_materia'];
$materia_clave=$_POST['materia_clave'];
	if($materia_clave==NULL){
	$sql="DELETE FROM especialidad_materia WHERE idespecialidad_mat='$idespecialidad_materia'";
	}	
	else{	
    $sql="DELETE FROM especialidad_materia WHERE idespecialidad_mat='$idespecialidad_materia'";
		}
	if(mysql_query($sql)){
		session_start();
		$_SESSION['almacenado']="E";
		header("Location: ../superuser/especialidad_materia.php");
	}
	else{
		session_start();
		$_SESSION['almacenado']="N";
		header("Location: ../superuser/especialidad_materia..php");
	}
?>



