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
                //Consulta que inserta los datos del usuario
				if($i>0){
					if($data[0]!=0){
					echo "error";
					}
					else{
                       $sql = "insert into materia(clave,nombre,creditos) values('".$valor1."','".$valor2."','".$valor3."');";
					}		
				}$i++;
				if(mysql_query($sql)){
				session_start();
				$_SESSION['almacenado']="I";
				header("Location: ../superuser/materia_administrador.php");
	            }else{
				session_start();
				$_SESSION['almacenado']="D";
				header("Location: ../superuser/materia_administrador.php");
      			}
                
                }            
                }else{
				//si aparece esto es posible que el archivo no tenga el formato adecuado
				session_start();
				$_SESSION['almacenado']="C";
				header("Location: ../superuser/materia_administrador.php");
			 }   
    }
?>