<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Alumnos</title>
	<link href="../css/estilo.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/myjava1.js"></script>
    <!--Código para llamar al archivo bootstrap.css que se encuentra en la carpeta css y  el cual permite tener interfaces limpias y con un diseño responsive-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    	<!--Código para llamar al archivo font-awesome.css que se encuentra en la carpeta css y  el cual permite agregar iconos comúnes por gráficos vectoriales transformadas en fuentes-->
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<style>
		#agregar_usuario{
		  text-align: right;
		  color:green;
		  padding: 5px;
		  margin-right: 10px;
		  padding-bottom: 5px;
		}
		.control-label{
		  /*padding-top: 5px;*/
		  margin-top: 8px;
		}
		.form-control{
		  margin-top: 4px;
		}
		.btn{
		  margin-top: 5px;
		}
		#formulario1{
		  text-align: center;
		  color:green;
		  }
		  #inp {
		  text-align: center;
		  margin: auto;
        }
	</style>
  </head>
  <!--Código para mandar llamar la función buscarusuario() que se encuentra  en el archivo funciones_alumnos_administrador.php dentro de la carpeta functions-->
  <script>
     function buscarusuario(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion},
              url: '../functions/funciones_alumnos_administrador.php',
              type:'post',
              beforeSend: function(){

              },
              success: function(respuesta){
              // alert($tipoopcion);
                $("#div_resultado").html(respuesta);
              },
              error: function(xhr,err){

              }
          });
      } 
  </script>    
  <body onload="buscarusuario()">  
      <div id="header-login">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
      </div>	  
	  <!--Código para mandar mensaje de alerta-->
      <div id="agregar_usuario">
           <?php
                  if(isset($_SESSION['almacenado'])){
                      if($_SESSION['almacenado']=="Y"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Alumno guardado correctamente</b></h6>';
                          echo '  </div>';   
                      }
                      if($_SESSION['almacenado']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡ Dato dúplicado, Fallo al guardar al nuevo usuario !</b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="A"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Datos editados correctamente </b></h6>';
                          echo '  </div>';   
                      }
					    if($_SESSION['almacenado']=="B"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡ Fallo al guardar la edicion del alumno !</b></h6>';
                          echo '  </div>';       
                      }
                      if($_SESSION['almacenado']=="E"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Alumno eliminado correctamente </b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="N"){
						  echo ' <div class="alert alert-warning">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡ Este usuario tiene datos en el sistema y por lo tanto no se puede eliminar</b></h6>';
                          echo '  </div>';   
                      }
					  if($_SESSION['almacenado']=="I"){
						  echo ' <div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>  Archivo importado correctamente</b></h6>';
                          echo '  </div>';   
                      }
					  if($_SESSION['almacenado']=="D"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡Archivo inválido! No cumple con el formato indicado ó hay datos dúplicados (los datos no dúplicados si se guardaran) </b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="C"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡Archivo inválido!, No se cargaron los datos </b></h6>';
                          echo '  </div>';       
                      }
                      unset($_SESSION['almacenado']);
                  }       
            ?>
            <?php
                    if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:green;" data-target="#window_form_add_user">';
                                    echo '<i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Agregar Alumno</i>';
                                    echo '</button>';
                                echo '</td>';
								
								echo '<div class="container">';
								echo '	<div class="panel-group">';
								echo '	  <div class="panel panel-default">';
								echo '		<div class="panel-heading">';
								echo '		   <h4 class="panel-title">';
								echo '		      <center><a data-toggle="collapse" href="#collapse1">¿Deseas importar una lista de alumnos?, Da clic aquí <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a></center>';
								echo '		   </h4>';
								echo '	    </div>';
								echo '	  <div id="collapse1" class="panel-collapse collapse">';
								echo '	    <br>';
								echo '		<!--Aquí empieza el section para descargar plantilla csv-->';								
								echo '			<section>';
								echo '				<div class="posts">';
								echo '					<article>';
								echo '						<ul class="actions">';
								echo '							<center><i class="fa fa-download" aria-hidden="true"><a href="../excel/alumno.csv"> Descargar plantilla</a></i></center>';
								echo '						</ul>';
								echo '					</article>';
								echo '				</div>';
								echo '			</section>';
								echo '		 <!--Termina section-->';
								echo '	<!--Aquí empieza el código para importar la lista de usuarios alumnos por lote csv-->';
								echo '		<div id="formulario1">';
								echo '			<form name="formulario1" action="../php/registroBDalu.php" method="post" enctype="multipart/form-data">';
								echo '				<h2>Carga de Base de Datos de los Usuarios alumnos</h2><br>';
								echo '				Importar Archivo Tipo *.CSV : <input id="inp" type="file" name="sel_file" size="20" >';
								echo '				<br>';
								echo '				<br>';
								echo '				<input type="submit" name="submit" id="boton" value="Cargar">';
								echo '			</form>';
								echo '		</div>';
								echo '		<br>';
								echo '	  </div>';
								echo '	</div>';
								echo '  </div>';
								echo '</div>';
                    }
            ?> 			
      </div>
	  	 
     <?php
        include ('../forms/form_nuevo_alumno.php');
     ?>
      <br>       
	  <!--Contenedor de búsqueda-->
      <div id="container">
            <div class="form-group >        
                 <form name="form_usuarios" method="post" action="" class="form-inline">
				  <div class="form-group col-xs-2">
                  </div>
                  <div class="form-group col-xs-6">
                     <center><input type="text"  name="txt_buscar" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscarusuario()" placeholder="Buscar . . ."/> </center><br>
                  </div>
                  <div class="form-group col-xs-4">    
                     <select class="form-control" name="opciones" id="tipoopcion" style="width:160px">
						<option value="id_usuario">No. Control</option>
						<option value="nombre">Nombre</option>
                                                <option value="ap_paterno">Apellido Paterno</option>
						<option value="ap_materno">Apellido Materno</option>
						<option value="puesto">Status</option>
                     </select>
                  </div>       
                 </form>
            </div>
          </div>        
	  <!--Formulario de usuarios-->
            <div class="form-group col-xs-12"> 	
          		<?php
          		echo '<div id="div_resultado">';
    	      	echo '</div>';
          		?>
            </div>  	
      </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>