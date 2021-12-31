<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INICIO</title>
    <!--<link rel="stylesheet" type="text/css" href="css/estilo_index.css">-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <style type="text/css">
      #agregar_solicitud{
      text-align: right;
      color:green;
      padding: 5px;
      margin-right: 10px;
      padding-bottom: 5px;
    }
    #btn_enviar{
      margin-top: 10px;
      margin-right: 40%;
      margin-left: 40%;
    }
    </style>
  </head>
  <script>
      function buscarsolicitudes(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion},
              url: '../functions/funciones_solicitudes_administrador.php',
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
      function buscar_departamento(){
        $txtempresa= $("#empresa").val();
        //alert($txtempresa);
          $.ajax({
              data: {"txtempresa":$txtempresa},
              url: '../functions/funciones_solicitudes_consultas.php',
              type:'post',
              beforeSend: function(){

              },
              success: function(respuesta){
               //alert("Busco departamento");
                $("#departamento").html(respuesta);
              },
              error: function(xhr,err){

              }
          });
      }
      function buscar_responsable(){
        $txtresponsable= $("#departamento").val();
        //alert($txtresponsable);
          $.ajax({
              data: {"txtresponsable":$txtresponsable},
              url: '../functions/funciones_solicitudes_consultas.php',
              type:'post',
              beforeSend: function(){

              },
              success: function(respuesta){
              // alert($txtresponsable);
                $("#responsable").html(respuesta);
              },
              error: function(xhr,err){

              }
          });
      }
       function buscar_especialidad(){
        $txtdivision= $("#division").val();
         // alert($txtdivision);
          $.ajax({
              data: {"txtdivision":$txtdivision},
              url: '../functions/funciones_solicitudes_consultas.php',
              type:'post',
              beforeSend: function(){

              },
              success: function(respuesta){
               //alert($tipoopcion);
                $("#especialidad").html(respuesta);
              },
              error: function(xhr,err){

              }
          });
      }

        function buscar_actualizar_especialidad($idsolicitud){
         $txtdivision_actualizar="#iddivision_actualizar_".concat($idsolicitud);
         $txtdivision_buscar= $($txtdivision_actualizar).val();
         //alert($txtdivision_actualizar);
            $.ajax({
                data: {"txtdivision_actualizar":$txtdivision_buscar},
                url: '../functions/funciones_solicitudes_consultas.php',
                type:'post',
                beforeSend: function(){

                },
                success: function(respuesta){
                  $mostrar= "#idespecialidad_actualizar_"+$idsolicitud;
                //  alert($mostrar);
                $($mostrar).html(respuesta);
                },
                error: function(xhr,err){

                }
            });
        }
  </script>    
  <body onload="buscarsolicitudes()">  
      <!--<div id="header">
         <?php 
         //include ('../include/header.php');
         ?>
      </div>-->
	  <div id="header-login">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
      </div>
      <div id="agregar_solicitud">
           <?php
                  if(isset($_SESSION['almacenado'])){
                      if($_SESSION['almacenado']=="Y"){
                           echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Solicitud guardada correctamente</b></h6>';
                          echo '  </div>';   
                      }
                      if($_SESSION['almacenado']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>Fallo al guardar nueva solicitud !</b></h6>';
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
                          echo '  <h6 style="text-align:center;"><b> ¡ Fallo al guardar la edicion de la solicitud !</b></h6>';
                          echo '  </div>';       
                      }
                      if($_SESSION['almacenado']=="E"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Solicitud eliminada correctamente </b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="N"){
						  echo ' <div class="alert alert-warning">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> ¡ Este solicitud tiene datos en el sistema y por lo tanto no se puede eliminar</b></h6>';
                          echo '  </div>';   
                      }
                      unset($_SESSION['almacenado']);
                  }       
            ?>   
           <?php
                    if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:green;" data-target="#window_form_add_solicitud">';
                                echo '<i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Agregar Solicitud</i>';
                                echo '</button>';
                                echo '</td>';						
                    }
            ?>	          
     </div> 
     <?php
        include ('../forms/form_nueva_solicitud.php');
     ?>
      <br>  
     <!-- <div class="row">-->
      <div id="container">
              <div class="form-group col-xs-12">        
                 <form name="form_solicitudes" method="post" action="" class="form-inline">
                  <div class="form-group col-xs-7">
                      <center><input type="text"  name="txt_buscar" size="90" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscarsolicitudes()" placeholder="Buscar . . ."/></center>
                  </div>
                  <div class="form-group col-xs-5">    
                        <select class="form-control" name="opciones" id="tipoopcion">
						<option value="folio">Folio</option>
                        <option value="empresa">Empresa</option>                       
                        <option value="prestamo">Tipo de servicio</option>
                        <option value="division">División</option>
                        <option value="status">Situación</option>
                     </select>
                  </div>       
                 </form>
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
