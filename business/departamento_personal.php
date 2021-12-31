<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsable</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos_agregar.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
  </head>
  <script>
     function buscaresponsable(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion},
              url: '../functions/funciones_responsables_administrador.php',
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
  <body onload="buscaresponsable()">  
		<div id="header-login">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
        </div>
      <div id="agregar_responsable">
           <?php
                  if(isset($_SESSION['almacenado'])){
                      if($_SESSION['almacenado']=="Y"){
                           echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Departamento guardado correctamente</b></h6>';
                          echo '  </div>';   
                      }
                      if($_SESSION['almacenado']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>¡Fallo al guardar al nuevo departamento!</b></h6>';
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
                          echo '  <h6 style="text-align:center;"><b> ¡No se puede actualizar registro!, Se tiene una solicitud elaborada con estos datos</b></h6>';
                          echo '  </div>';       
                      }
                      if($_SESSION['almacenado']=="E"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Departamento eliminado correctamente</b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="N"){
						  echo ' <div class="alert alert-warning">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>  Este departamento tiene datos en el sistema y por lo tanto no se puede eliminar</b></h6>';
                          echo '  </div>';   
                      }
                      unset($_SESSION['almacenado']);
                  }       
            ?>   
            <button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:green;" data-target="#window_form_add_responsable">
              <i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Agregar Responsable</i>
            </button>
     </div>
     <?php
        include ('../forms/form_nuevo_departamento_per.php');
     ?>
      <br>       
       <!-- <div class="row">-->
      <div id="container">
              <div class="form-group col-xs-12">        
                 <form name="form_responsable" method="post" action="" class="form-inline">
                  <div class="form-group col-xs-7">
                       <center><input type="text"  name="txt_buscar" size="70" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscaresponsable()" placeholder="Buscar . . ."/> </center><br>
                  </div>
                  <div class="form-group col-xs-5">    
                        <select class="form-control" name="opciones" id="tipoopcion">
						 <option value="nombre_empresa">Empresa</option>
					     <option value="nombre">Nombre</option>
						 <option value="ap">Apellido Paterno</option>
						 <option value="am">Apellido Materno</option>
						 <option value="nombre_departamento">Departamento</option>
                     </select>
                  </div>       
                 </form>
            </div>
          </div>        
      <!--<div class="row content">-->
            <div class="form-group col-xs-12"> 	
          		<?php
          		echo '<div id="div_resultado">';
    	      	echo '</div>';
          		?>
            </div>  	
      </div>
      <div id="footer">
      </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>