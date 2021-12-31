<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INICIO</title>
    <!--<link rel="stylesheet" type="text/css" href="css/estilo_index.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  </head>
  <script>
      function buscarempresas(){
          $txtabuscar= $("#txt_buscar").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar},
              url: 'functions/funciones_empresas_alumnos.php',
              type:'post',
              beforeSend: function(){

              },
              success: function(respuesta){
               // alert($txtabuscar);
                $("#div_resultado").html(respuesta);
              },
              error: function(xhr,err){

              }
          });
      }
  </script>    
  <body onload="buscarempresas()">  
      <div id="header">
         <?php 
         include ('./include/header.php');
         ?>
      </div> 
      <div id="container">
        <div class="col-xs-12">
      		 <form name="form_empresas" method="post" action="">
        		 	<input type="text"  name="txt_buscar" size="200" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscarempresas()" placeholder="BUSCAR NOMBRE . . ."/><br>
          </form>
        </div> 
        <div class="form-group col-xs-12"> 	
      		<?php
      		echo '<div id="div_resultado">';     			
	      	echo '</div>';
      		?>
        </div>	
      </div>
      <div id="footer">
      </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>