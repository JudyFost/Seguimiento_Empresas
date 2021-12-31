<?php
//Código para mandar llamar el archivo conexion.php que se encuentra en la carpeta include y que contiene la conexion a la base de datos
include ('../include/conexion.php');

    if(isset($_POST["submit"]))
    {
        //Aquí es donde seleccionamos nuestro .csv
         $fname = $_FILES["sel_file"]["name"];
         echo "Cargando nombre del archivo: $fname ";
         $chk_ext = explode(".",$fname);
        
         if(strtolower(end($chk_ext)) == "csv")
         {
             //Si es correcto, entonces damos permisos de lectura para subir
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
				$valor6=md5($data[5]);
				$valor7=$data[6];
				$valor8=$data[7];
			    $valor9=$data[8];
		        $valor10=$data[9];
				$valor11=$data[10];
                //Consulta que inserta los datos del usuario
				if($i>0){
					if($data[4]=="ADMINISTRADOR"){
					$sql="INSERT INTO usuario VALUES ('$valor1',upper('$valor2'),upper('$valor3'),upper('$valor4'),1,'$valor6','$valor7','$valor8','$valor9','$valor10',upper('$valor11'));";	
					}
					if($data[4]=="RESPONSABLE EMPRESA"){
					$sql="INSERT INTO usuario VALUES ('$valor1',upper('$valor2'),upper('$valor3'),upper('$valor4'),3,'$valor6','$valor7','$valor8','$valor9','$valor10',upper('$valor11'));";	
					}
					if($data[4]=="PERSONAL DE LA EMPRESA"){
					$sql="INSERT INTO usuario VALUES ('$valor1',upper('$valor2'),upper('$valor3'),upper('$valor4'),4,'$valor6','$valor7','$valor8','$valor9','$valor10',upper('$valor11'));";	
					}
					if($data[4]=="JEFE DE DIVISION"){
					$sql="INSERT INTO usuario VALUES ('$valor1',upper('$valor2'),upper('$valor3'),upper('$valor4'),5,'$valor6','$valor7','$valor8','$valor9','$valor10',upper('$valor11'));";	
					}
					if($data[4]=="JEFE DE DEPARTAMENTO"){
					$sql="INSERT INTO usuario VALUES ('$valor1',upper('$valor2'),upper('$valor3'),upper('$valor4'),6,'$valor6','$valor7','$valor8','$valor9','$valor10',upper('$valor11'));";	
					}
					else{
					echo "error";
					}		
				}$i++;
				if(mysql_query($sql)){
				//Código para iniciar una nueva sesión o reanudar la existente
				session_start();
				//Aquí se manda a llamar la variable de sesión con el valor I, el cual mandara el siguiente mensaje: Archivo importado correctamente
				$_SESSION['almacenado']="I";
				header("Location: ../superuser/usuario_responsable.php");
	            }else{
			    //Código para iniciar una nueva sesión o reanudar la existente
				session_start();
				//Aquí se manda a llamar la variable de sesión con el valor D, el cual mandara el siguiente mensaje: ¡Archivo inválido! No cumple con el formato indicado ó hay datos dúplicados (los datos no dúplicados si se guardaran)
				$_SESSION['almacenado']="D";
				header("Location: ../superuser/usuario_responsable.php");
      			}
                
                }            
                }else{
				//Si aparece esto es posible que el archivo no tenga el formato adecuado
				//Código para iniciar una nueva sesión o reanudar la existente
				session_start();
				//Aquí se manda a llamar la variable de sesión con el valor C, el cual mandara el siguiente mensaje: ¡Archivo inválido!, No se cargaron los datos
				$_SESSION['almacenado']="C";
				header("Location: ../superuser/usuario_responsable.php");
			 }   
    }
?>