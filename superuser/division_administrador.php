<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DIVISION</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <style type="text/css">
      #agregar_division{
      text-align: right;
      color:green;
      padding: 5px;
      margin-right: 10px;
      padding-bottom: 5px;
    }
    </style>
  </head>
  <script>
      function buscardivision(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion},
              url: '../functions/funciones_division_administrador.php',
              type:'post',
              beforeSend: function(){

              },
              success: function(respuesta){
                $("#div_resultado").html(respuesta);
              },
              error: function(xhr,err){

              }
          });
      } 
  </script>    
  <body onload="buscardivision()">  
	  <div id="header-login">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
      </div>
      <div id="agregar_division">
           <?php
                  if(isset($_SESSION['almacenado'])){
                      if($_SESSION['almacenado']=="Y"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Carrera guardada correctamente</b></h6>';
                          echo '  </div>';   
                      }
                      if($_SESSION['almacenado']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>Fallo al guardar nueva carrera!</b></h6>';
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
                          echo '  <h6 style="text-align:center;"><b> Fallo al guardar la edicion de la carrera!</b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="E"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Carrera eliminada correctamente </b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="N"){
						  echo ' <div class="alert alert-warning">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>  Esta carrera a un tiene datos en el sistema y por lo tanto no se puede eliminar</b></h6>';
                          echo '  </div>';   
                      }
                      unset($_SESSION['almacenado']);
                  }       
            ?>		
            <?php
                    if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                echo '  <button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:green;" data-target="#window_form_add_division">';
							    echo '      <i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Agregar Carrera</i>';
							    echo '  </button>';
                                echo '</td>';						
                    }
            ?>	         
     </div> 
     <?php
       include ('../forms/form_nueva_division.php');
     ?>
      <br>  
     <!-- <div class="row">-->
      <div id="container">
              <div class="form-group col-xs-12">        
                 <form name="form_especialidades" method="post" action="" class="form-inline">
                  <div class="form-group col-xs-8">
                       <center><input type="text"  name="txt_buscar" size="70" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscardivision()" placeholder="Buscar . . ."/> </center>
                  </div>
                  <div class="form-group col-xs-4">    
                     <select class="form-control" name="opciones" id="tipoopcion">
						<option value="clave_carrera">Clave</option>
                        <option value="nombre_carrera">Nombre</option>
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