<?php
include("conexion.php");
$pass=md5($_POST['password']);
$usuario=$_POST['usuario'];
//echo $usuario. ":".$pass;
$consult=mysql_query("SELECT * FROM usuario WHERE idusuario='$usuario' AND password='$pass'");
$nr=mysql_num_rows($consult);
	if($nr==1){   // es correcto su logueo para administrativos, jefes, director
		session_start();
		//echo 'Menu de usuario';
		while($row = mysql_fetch_array($consult)){
		      		$iduser=$row['idusuario'];
		      		$tipo=$row['tipo_usuario_idtipo'];
		      		$ap_materno=$row['ap_materno'];
		      		$ap_paterno=$row['ap_paterno'];
		      		$nombre=$row['nombre'];
		      		
		      }
		      $_SESSION["idusuario"]=$iduser;
              $_SESSION["ap_paterno"]=$ap_paterno;
              $_SESSION["ap_materno"]=$ap_materno;
              $_SESSION["nombre"]=$nombre;
		   	  $_SESSION["tipo"]=$tipo;
		   	  $_SESSION["logueo"]='t';
	
		   	   if($_SESSION["tipo"]=='1'){//tipo de sesion para administrador
		   	  	  header("Location: ../superuser/usuario_responsable.php");	
		   	   }
			   if($_SESSION["tipo"]=='2'){//tipo de sesion para alumnos
		   	   		//sacar la division para posteriormente utilizarla en la vista consulta solicitudes 
		   	   		//la vista se generara automaticamente dependiendo de a division del alumno.
		   	   		$sqldivision=mysql_query("SELECT carrera_idcarrera FROM alumno WHERE usuario_idusuario='$iduser'");
	               while($rowdivision = mysql_fetch_array($sqldivision))
	               {
	               	$iddivision=$rowdivision['carrera_idcarrera'];
	               }
	               $_SESSION["iddivision_alumno"]=$iddivision;
	               ////fin de sacar division 
		   	   	   header("Location: ../students/solicitudes_alumnos.php");
	           }
		   	   if($_SESSION["tipo"]=='3'){//tipo de sesion para empresas
		   	  	   header("Location: ../business/solicitud_empresa.php");	
		   	   }
			   if($_SESSION["tipo"]=='4'){//tipo de sesion para empresas
		   	  	   header("Location: ../business/solicitud_empresa.php");	
		   	   }
               if($_SESSION["tipo"]=='5'){//tipo de sesion para jefe de división
		   	  	  header("Location: ../superuser/alumnos_administrador.php");	
		   	   }
               if($_SESSION["tipo"]=='6'){//tipo de sesion para jefe de departamento
		   	  	  header("Location: ../superuser/alumnos_administrador.php");	
		   	   }			   
	 }	
			if($nr==0){  //falso no registrado
			      echo "No registrado";
			      session_start();
				   $_SESSION["logueo"]='f';   
			       header("Location: ../indexar.php");			
	        }
	
?>


