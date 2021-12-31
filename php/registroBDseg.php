<?php
include ('../include/conexion.php');

    if(isset($_POST["submit"]))
    {
        //Aquí es donde seleccionamos nuestro .csv
         $fname = $_FILES["sel_file"]["name"];
         echo "Cargando nombre del archivo: $fname ";
         $chk_ext = explode(".",$fname);
        
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");  
             $i=0;			 
             while (($data = fgetcsv($handle, 1000, ",")) == true)
                {             
               //Insertamos los datos con los valores
                $valor1=$data[0];
                $valor2=$data[1];
                $valor3=$data[2];
				$valor4=$data[3];
				$valor5=$data[4];
				$valor6=$data[5];
				$valor7=$data[6];
				$valor8=$data[7];
			    $valor9=$data[8];
		        $valor10=$data[9];
				$valor11=$data[10];
                //Consulta que inserta los datos del usuario
				if($i>0){
					if($data[0]!=0){
					echo "error";
					}
					else{
						$sql="INSERT INTO alumno (idcontrol, usuario_idusuario, semestre, seguro_facultativo, creditos_actuales, situacion_alumno_clave, tipo_alumno_clave, carrera_idcarrera, servicio_social, residencia_profesional, proyecto_dual) VALUES ('".$valor1."','".$valor2."','".$valor3."','".$valor4."','".$valor5."','".$valor6."','".$valor7."','".$valor8."','".$valor9."','".$valor10."','".$valor11."');";					}		
				}$i++;
				if(mysql_query($sql)){
				session_start();
				$_SESSION['almacenado']="I";
				header("Location: ../superuser/historial_alumno.php");
	            }else{
				session_start();
				$_SESSION['almacenado']="D";
				header("Location: ../superuser/historial_alumno.php");
      			}
                
                }            
                }else{
				//si aparece esto es posible que el archivo no tenga el formato adecuado
				session_start();
				$_SESSION['almacenado']="C";
				header("Location: ../superuser/historial_alumno.php");
			 }   
    }
?>