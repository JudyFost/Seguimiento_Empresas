<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <title>INICIO</title>
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
    }
    </style>
    <!--<link rel="stylesheet" type="text/css" href="css/estilo_index.css">-->
  </head>
  <body>  
      <div id="header">
         <?php 
         include ('../include/header.php');
         ?>
      </div>
      <div class="container">
        <div class="panel panel-default">
          <center><h2>Tecnológico de Estudios Superiores de Jocotitlán</h2> </center>
        </div>
      </div>
         <?php
         //se incluye slider 
         include ('../include/slider_students.php');
         ?>

      <div class="container">
          <div class="well">
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#mas_informacion">¿Como usar esta página?</button>            
              <br>
              <br>
              <div id="mas_informacion" class="collapse">
                <p>
                  Para poder consultar más información de las solicitudes disponibles tendras que ser usuario registrado,  y si estas interesado 
                  en la solicitud y cumples los requisitos deberas acudir al departamento de Servicio Social y Residencia Porfesional, con el número 
                  de solicitud, para que te canalicen hacia la empresa.
                 <br>
                 <br>
                 <b> Para más información: </b>
                <br>
                <br>
                  <left>
                    <a href="pdfs/folletoservicio.pdf" target="_blank"> Ver Folleto servicio </a>
                  </left>
                  <center>
                    <a href="pdfs/folletoresidencia.pdf" target="_blank">Ver Folleto residencia </a>
                  </center>  
                  <right>
                    <a href="https://www.google.com.mx/maps/place/Tecnol%C3%B3gico+de+Estudios+Superiores+de+Jocotitl%C3%A1n/@19.67511,-99.8018948,15z/data=!4m5!3m4!1s0x0:0x282b76308914a3d1!8m2!3d19.67511!4d-99.8018948" target="_blank"> Ubicación del TESjo </a>
                  </right>
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
    <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.js"></script>
  </body>
</html>