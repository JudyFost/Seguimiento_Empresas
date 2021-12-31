<?php
session_start(); 
?>
<!--<!DOCTYPE html>
<html lang="en">-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MATERIAS</title>
	<link href="../css/estilo.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/myjava.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <style type="text/css">
      #agregar_materia{
      text-align: right;
      color:green;
      padding: 5px;
      margin-right: 10px;
      padding-bottom: 5px;
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
  <script>
      function buscarmaterias(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion},
              url: '../functions/funciones_materias_administrador.php',
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
  <body onload="buscarmaterias()">  
	  <div id="header-login">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
      </div>
      <div id="agregar_materia">
           <?php
                  if(isset($_SESSION['almacenado'])){
                      if($_SESSION['almacenado']=="Y"){
                           echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Materia guardada correctamente</b></h6>';
                          echo '  </div>';   
                      }
                      if($_SESSION['almacenado']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>Fallo al guardar nueva materia !</b></h6>';
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
                          echo '  <h6 style="text-align:center;"><b> Fallo al guardar la edicion de esta materia !</b></h6>';
                          echo '  </div>';       
                      }
                      if($_SESSION['almacenado']=="E"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Materia eliminada correctamente</b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="N"){
						  echo ' <div class="alert alert-warning">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>  Este materia tiene datos en el sistema y por lo tanto no se puede eliminar</b></h6>';
                          echo '  </div>';   
                      }
					  if($_SESSION['almacenado']=="I"){
						  echo ' <div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>  Este archivo importado correctamente</b></h6>';
                          echo '  </div>';   
                      }
					  if($_SESSION['almacenado']=="D"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡Error!, Esté archivo tiene datos dúplicados</b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="C"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡Archivo inválido!</b></h6>';
                          echo '  </div>';       
                      }
                      unset($_SESSION['almacenado']);
                  }       
            ?> 
            <?php
                    if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:green;" data-target="#window_form_add_materia">';
                                    echo '<i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Agregar Materia</i>';
                                    echo '</button>';
                                echo '</td>';
								
								echo '<div class="container">';
								echo '	<div class="panel-group">';
								echo '	  <div class="panel panel-default">';
								echo '		<div class="panel-heading">';
								echo '		   <h4 class="panel-title">';
								echo '		      <center><a data-toggle="collapse" href="#collapse1">¿Deseas importar una lista de materias?, Da clic aquí <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a></center>';
								echo '		   </h4>';
								echo '	    </div>';
								echo '	  <div id="collapse1" class="panel-collapse collapse">';
								echo '	    <br>';
								echo '		<!--Aquí empieza el section para descargar plantilla csv-->';								
								echo '			<section>';
								echo '				<div class="posts">';
								echo '					<article>';
								echo '						<ul class="actions">';
								echo '							<center><i class="fa fa-download" aria-hidden="true"><a href="../excel/materia.csv"> Descargar plantilla</a></i></center>';
								echo '						</ul>';
								echo '					</article>';
								echo '				</div>';
								echo '			</section>';
								echo '		 <!--Termina section-->';
								echo '	<!--Aquí empieza el código para importar la lista de materias por lote csv-->';
								echo '		<div id="formulario1">';
								echo '			<form name="formulario1" action="../php/registroBD.php" method="post" enctype="multipart/form-data">';
								echo '				<h2>Carga de Base de Datos de las materias</h2><br>';
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
       include ('../forms/form_nueva_materia.php');
     ?>
      <br>  
     <!-- <div class="row">-->
      <div id="container">
              <div class="form-group col-xs-12">        
                 <form name="form_solicitudes" method="post" action="" class="form-inline">
                  <div class="form-group col-xs-7">
                       <center><input type="text"  name="txt_buscar" size="73" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscarmaterias()" placeholder="Buscar . . ."/> </center>
                  </div>
                  <div class="form-group col-xs-5">    
                        <select class="form-control" name="opciones" id="tipoopcion">
                        <option value="clave">Clave materia</option>
                        <option value="nombre">Nombre</option>
                     </select>
                  </div>       
                 </form>
            </div>  
            </div>
          </div>  
        <div class="form-group col-xs-12">  
          <?php
          echo '<div id="div_resultado">';            
          echo '</div>';                                    
          ?>
        </div>  
      <div id="footer"></div> 
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>