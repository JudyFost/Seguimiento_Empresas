<?php 
session_start();
  if(isset($_SESSION["tipo"])){
      if($_SESSION["tipo"]=='1'){//tipo de sesion para alumnos
              header("Location: ../superuser/administrador.php"); 
          }
       if($_SESSION["tipo"]=='2'){
         // header("Location: ../superuser/alumnos.php"); 
		  header("Location: ../students/alumnos.php"); 
      }    
  }  
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
    <link rel="stylesheet" type="text/css" href="../css/estilo_formulario.css">
  </head>
  <body>   
      <div id="header">
         <?php 
  //       include ('../include/header.php');
         ?>
      </div>
      <div class="container"> 
          <div id="id_formulario">
                <center>  <i class="fa fa-user-secret fa-4x" aria-hidden="true"></i></center>
              <form class="form-horizontal" action="../include/validalogin.php" method="post">
              <div class="form-group">
                <label class="control-label col-sm-5" for="usuario">Usuario:</label>
                <div class="col-sm-2">                  
                     <input  type="text" name="usuario" id="usuario" class="form-control input-sm" size="20" maxlength="20" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-5" for="password">Contraseña:</label>
                <div class="col-sm-2">                  
                     <input  type="password" name="password" id="password"  class="form-control input-sm" size="25" maxlength="25" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">                 
                      <input type="submit" name="login" value="Entrar" id="boton" class="btn btn-success"> 
                </div>
              </div>           
            </form>
        </div>
    </div>
    <div class="col-sm-offset-4 col-sm-3">
      <?php
        if(isset($_SESSION["logueo"])){
          if($_SESSION["logueo"]=='f'){
             echo '<br>';
              echo '<div class="alert alert-danger">';
                  echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                  echo '  <h6 style="text-align:center;"><b> Datos incorrectos, ¡ verifica tus datos !</b></h6>';
                  echo '  </div>';
              unset($_SESSION["logueo"]);
            session_destroy();  
          }
        }
      ?>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>
