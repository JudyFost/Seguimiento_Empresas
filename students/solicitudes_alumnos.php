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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <style type="text/css">

    </style>
  </head>
  <script>
      function buscarsolicitudes(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $iddivision= $("#iddivision").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion,"iddivision":$iddivision},
              url: '../functions/funciones_solicitudes_alumnos.php',
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
  <body onload="buscarsolicitudes()">  
      <div id="header-login ">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
      </div> 
     <!-- <div class="row">-->
      <div id="container">
              <div class="form-group col-xs-12">        
                 <form name="form_solicitudes" method="post" action="" class="form-inline">
                  <div class="form-group col-xs-8">
                       <center><input type="text"  name="txt_buscar" size="110" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscarsolicitudes()" placeholder="Buscar . . ."/> </center>
                  </div>
                  <div class="form-group col-xs-4">    
                        <select class="form-control" name="opciones" id="tipoopcion">
						<option value="folio">Folio</option>
                        <option value="empresa">Empresa</option>
                        <option value="prestamo">Tipo de servicio</option>
						<option value="division">Carrera</option>
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