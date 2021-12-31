<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <title>Administrativo</title>
    <style type="text/css">
    .well{
      padding-top: 15px;
      margin-top: 15px;
    }
    footer{
      font-size: 10px;
      margin: 0;
      padding: 0;
    }
    .panel-footer{
      background: #D8D8D8;
    }</style>
    <!--<link rel="stylesheet" type="text/css" href="css/estilo_index.css">-->
  </head>
  <body>  
      <div id="header">
         <?php 
         include ('./include/header.php');
         ?>
      </div>
 <div class="container">
        <div class="panel panel-default">
          <center><h2>Tecnológico de Estudios Superiores de Jocotitlán</h2> </center>
        </div>
      </div>
         <?php
         //se incluye slider 
         include ('./include/slider_business.php');
         ?>

      <div class="container">
          <div class="well">
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#mas_informacion">¿Empresas?</button>            
              <br>
              <br>
              <div id="mas_informacion" class="collapse">
                <p>
                  <b>De clic sobre la tarea que desea realizar:</b><br />
                  En este apartado podra agregar y editar registros, tales como empresa, solicitudes, usuarios, departamentos, materias.
                </p> 
              </div>           
           </div>             
      </div>   

      <div id="footer">
        <footer class="container text-center">
          <div class="panel-footer">
            <p>Tecnológico de Estudios Superiores de Jocotitlán, Carretera Toluca-Atlacomulco km 44.8, Ejido de San Juan y San Agustin, Jocotitlán, Edo. México</p>
                     <p>@2016 Vinculación y Extensión TESJo</p>
          </div>
        </footer>        
      </div>
    <script src="js/jquery.js"></script>
     <script src="js/bootstrap.js"></script>
  </body>
</html>