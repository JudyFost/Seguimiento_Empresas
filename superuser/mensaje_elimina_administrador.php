<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuario</title>
    <!--<link rel="stylesheet" type="text/css" href="css/estilo_index.css">-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
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
</style>
  </head>
  <script>
     function buscarusuario(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion},
              url: '../functions/funciones_usuarios_administrador.php',
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
      <div id="header">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
  

      </div> 
      <div id="Eliminar_usuario">
           <?php
                  if(isset($_SESSION['almacenado'])){
                      if($_SESSION['almacenado']=="Y"){
                           echo '<div class="alert alert-info">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Usuario eliminado correctamente</b></h6>';
                          echo '  </div>';   
                      }
                      if($_SESSION['almacenado']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b>Este usuario tiene mucha información en el sistema,verifique que no tenga información antes de proceder...</b></h6>';
                          echo '  </div>';       
                      }
                      unset($_SESSION['almacenado']);
                  }       
            ?>   
            <button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:green;" data-target="#window_form_add_user">
              <i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Eliminar Usuario</i>
            </button>
     </div>
     <?php
        include ('../forms/form_nuevo_usuario.php');
     ?>
      <br>       
       <!-- <div class="row">-->
      <div id="container">
              <div class="form-group col-xs-12">        
                <form name="form_usuarios" method="post" action="" class="form-inline">
                  <div class="form-group col-xs-10">
                     <center><input type="text"  name="txt_buscar" size="110" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscarusuario()" placeholder="Buscar . . ."/> </center><br>
                  </div>
                  <div class="form-group col-xs-2">    
                        <select class="form-control" name="opciones" id="tipoopcion">
							<option value="nombre">Nombre</option>
							<option value="id_usuario">Id Usuario</option>
							<option value="puesto">Puesto</option>
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