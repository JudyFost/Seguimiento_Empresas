<!--Método para invocar la sesion de una empresa antes de manipularla-->
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<style>
		#agregar_empresa{
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
     function buscarempresas(){
          $txtabuscar= $("#txt_buscar").val();
          $tipoopcion= $("#tipoopcion").val();
          $.ajax({
              data: {"txtabuscar":$txtabuscar,"tipoopcion":$tipoopcion},
              url: '../functions/funciones_empresas_administrador.php',
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
	  function buscar_giro(){
        $txtsector= $("#tipo_sector").val();
          $.ajax({
              data: {"txtsector":$txtsector},
              url: '../functions/funciones_solicitudes_consultas.php',
              type:'post',
              beforeSend: function(){

              },
              success: function(respuesta){
                $("#giro_comercial").html(respuesta);
              },
              error: function(xhr,err){

              }
          });
      }
	  
	  function buscar_actualizar_giro($idempresa){
         $txtsector_actualizar="#idsector_actualizar_".concat($idempresa);
         $txtsector_buscar= $($txtsector_actualizar).val();
            $.ajax({
                data: {"txtsector_actualizar":$txtsector_buscar},
                url: '../functions/funciones_solicitudes_consultas.php',
                type:'post',
                beforeSend: function(){

                },
                success: function(respuesta){
                  $mostrar= "#idgiro_actualizar_"+$idempresa;
                $($mostrar).html(respuesta);
                },
                error: function(xhr,err){

                }
            });
        }
  </script>    
  <body onload="buscarempresas()">  
      <div id="header-login">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
      </div>	  
	  <!--C?digo para mandar mensaje de alerta-->
      <div id="agregar_empresa">
           <?php
                  if(isset($_SESSION['almacenado'])){
                      if($_SESSION['almacenado']=="Y"){
                          echo '<div class="alert alert-success">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Empresa guardada correctamente</b></h6>';
                          echo '  </div>';   
                      }
                      if($_SESSION['almacenado']=="F"){
                          echo '<div class="alert alert-danger">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Dato dúplicado, Fallo al guardar a la nueva empresa !</b></h6>';
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
                          echo '  <h6 style="text-align:center;"><b> Fallo al guardar la edicion de la empresa !</b></h6>';
                          echo '  </div>';       
                      }
                      if($_SESSION['almacenado']=="E"){
                          echo '<div class="alert alert-success"">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Empresa eliminada correctamente </b></h6>';
                          echo '  </div>';       
                      }
					  if($_SESSION['almacenado']=="N"){
						  echo ' <div class="alert alert-warning">';
                          echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                          echo '  <h6 style="text-align:center;"><b> Esta empresa tiene datos en el sistema y por lo tanto no se puede eliminar</b></h6>';
                          echo '  </div>';   
                      }
                      unset($_SESSION['almacenado']);
                  }       
            ?> 
            <?php
                    if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:green;" data-target="#window_form_add_empresa">';
                                    echo '   <i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Agregar Empresa</i>';
                                    echo '</button>';
                                echo '</td>';						
                    }
            ?>	
      </div>
	 
     <?php
        include ('../forms/form_nueva_empresa.php');
     ?>  
	  <!--Contenedor de búsqueda-->
      <div id="container">
            <div class="form-group >        
                 <form name="form_empresas" method="post" action="" class="form-inline">
				  <div class="form-group col-xs-2">
                  </div>
                  <div class="form-group col-xs-6">
                     <center><input type="text"  name="txt_buscar" id="txt_buscar" class="form-control" style="text-transform: uppercase" oninput="buscarempresas()" placeholder="Buscar . . ."/> </center><br>
                  </div>
                  <div class="form-group col-xs-4">    
                     <select class="form-control" name="opciones" id="tipoopcion" style="width:150px">
						<option value="idempresa">Folio</option>
						<option value="nombre">Empresa</option>
					    <option value="rfc">RFC</option>
						<option value="razon_social">Razón social</option>
						<option value="nombre_sector">Tipo sector</option>
						<option value="nombre_giro">Giro Comercial</option>
                     </select>
                  </div>       
                 </form>
            </div>
       </div> 
	  <!--Formulario de empresa-->
            <div class="form-group col-xs-12"> 	
          		<?php
          		echo '<div id="div_resultado">';
    	      	echo '</div>';
          		?>
            </div>  	
      </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>
