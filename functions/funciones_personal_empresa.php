<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda del departamento por idusuario, nombre_empresa,nonmbre, apellido_paterno, apellido materno y nombre del departamento
$txtabuscar=$_POST['txtabuscar'];
$tipoopcion=$_POST['tipoopcion'];
//echo "tipo_opcion".$tipoopcion;
//echo "txtbuscar".$txtabuscar;
$idusuario_user=$_SESSION["idusuario"];
//echo "user:".$idusuario_user;
$sql_consulta=mysql_query("SELECT idempresa,nombre_empresa  FROM seguimiento_empresas.responsable_empresa where idusuario='$idusuario_user' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");
  while ($row_consulta=mysql_fetch_array($sql_consulta)){
  $nombre_empresa=$row_consulta['nombre_empresa']; 
  //echo "empresa:".$nombre_empresa;
  } 
  if($tipoopcion=="nombre_empresa"){
	  if($txtabuscar==NULL){
		  $sql_consulta=mysql_query("SELECT * FROM responsable_empresa where nombre_empresa='$nombre_empresa' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");
	  }
      else{
      $sql_consulta=mysql_query("SELECT * FROM seguimiento_empresas.responsable_empresa where nombre_empresa='$nombre_empresa' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");  
	  }
	  $sqlcon="SELECT COUNT(iddepartamento) AS numero FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by iddepartamento";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta empresa no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}  
  }
  
  //por empresa
          echo '<div id="div_resultado">';
            echo '<table border="0" class="table table-hover">';
            echo '<th>Id usuario</th><th>Empresa</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Departamento</th><th>Ver</th><th>Editar</th><th></th>';
            
			while ($row_consulta=mysql_fetch_array($sql_consulta)){
              $iddepartamento=$row_consulta['iddepartamento']; 
			  echo'<tr>';
                echo '<td>'.$row_consulta['idusuario'].'</td>'. " ".'<td>'.utf8_encode($row_consulta['nombre_empresa']).'</td>'." ".'<td>'.$row_consulta['nombre'].'</td>'."".'<td>'.utf8_encode($row_consulta['ap']).'</td>'."".'<td>'.$row_consulta['am'].'</td>';     
                echo'<td>'.$row_consulta['nombre_departamento'].'</td>';
                  //si usuario ya se registro podra ver la informacion
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$iddepartamento.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';

                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".'actualizar_departamento'.$iddepartamento.'" '.'>';
                                    echo '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
								
								/* echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".'eliminar_departamento'.$iddepartamento.'" '.'>';
                                    echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';*/
                                //mas informacion de la empresa solo usuario registrado podra ver.
                             //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$iddepartamento.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<font color="gray"><b><center>'."USUARIO:"." ".$row_consulta['idusuario'].'</b></font>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '      <p><b>'."USUARIO:".'</b>'." ".utf8_encode($row_consulta['idusuario']).'<br>'."<b>RESPONSABLE: </b>"." ".utf8_encode($row_consulta['nombre'])." ".utf8_encode($row_consulta['ap'])." ".utf8_encode($row_consulta['am']);
                                echo '        <b>'."<br>PUESTO (CARGO): </b>"." ".utf8_encode($row_consulta['cargo']);
								echo '        <b>'."<br>SEXO: ".'</b>';
												  $sexo=$row_consulta['sexo'];
												  if($sexo=='H'){
												  echo 'HOMBRE';
												  }
												  if($sexo=='M'){
												  echo 'MUJER';
												  }                                                       
                                echo '        <b>'."<br>CORREO: </b>"." ".utf8_encode($row_consulta['email']);
								echo '        <b>'."<br>TELÉFONO: </b>"." ".$row_consulta['telefono'];
								echo '        <b>'."<br>DIRECCIÓN: </b>"." ".utf8_encode($row_consulta['direccion']);
                                echo '      </p>';
                                echo '      </div>';
                                echo '      <div class="modal-footer">';
                                echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                                echo '      </div>';
                                echo '    </div>';
                                
                               echo '   </div>';
                               echo '</div>';   							   
                                 // fin de más información
              }

                           if($_SESSION['logueo']=='f'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal" style="color:#FE2E2E" data-target="#error_logueo">';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';

                           }
                                echo '</tr>';
                       }
             
                     if(!isset($_SESSION['logueo'])){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal" style="color:#FE2E2E" data-target="#error_logueo">';
                                    echo '<i class="fa fa-lock" aria-hidden="true"></i>';
                                    echo '</button>';
                     echo '</td>';

                     }
              echo '</tr>';
            }
    echo '</table>';
  echo '</div>';  

//cargar ventanas modales para editar
$idusuario_user=$_SESSION["idusuario"];
//echo "user:".$idusuario_user;
$sql_consulta=mysql_query("SELECT idempresa,nombre_empresa  FROM seguimiento_empresas.responsable_empresa where idusuario='$idusuario_user' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");
  while ($row_consulta=mysql_fetch_array($sql_consulta)){
  $nombre_empresa=$row_consulta['nombre_empresa']; 
  //echo "empresa:".$nombre_empresa;
  } 
  if($tipoopcion=="nombre_empresa"){
	  if($txtabuscar==NULL){
		  $sql_consulta=mysql_query("SELECT * FROM responsable_empresa where nombre_empresa='$nombre_empresa' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");
	  }
      else{
      $sql_consulta=mysql_query("SELECT * FROM seguimiento_empresas.responsable_empresa where nombre_empresa='$nombre_empresa' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");  
	  }
	  $sqlcon="SELECT COUNT(iddepartamento) AS numero FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by iddepartamento";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta empresa no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}  
  }
  
while ($row_actualizar=mysql_fetch_array($sql_consulta)){
              $iddepartamento=$row_actualizar['iddepartamento'];
/////////modificar situacion de una solicitud
                                      echo '<div class="modal fade" id='.'"'.'actualizar_situacion_e'.$iddepartamento.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR SITUACION</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_situacion_empre.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
            
//fin de ventanas modales        
 /////////modificar estatus de las solicitudes
                                      echo '<div class="modal fade" id='.'"'.'actualizar_departamento'.$iddepartamento.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR SOLICITUD</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_personal.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';              
                                     } 
									 //fin de ventanas modales  
//codigo eliminar registro
/*$idusuario_user=$_SESSION["idusuario"];
$sql_consulta=mysql_query("SELECT idempresa,nombre_empresa  FROM seguimiento_empresas.responsable_empresa where idusuario='$idusuario_user' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");
  while ($row_consulta=mysql_fetch_array($sql_consulta)){
  $nombre_empresa=$row_consulta['nombre_empresa']; 
  } 
  if($tipoopcion=="nombre_empresa"){
	  if($txtabuscar==NULL){
		  $sql_consulta=mysql_query("SELECT * FROM responsable_empresa where nombre_empresa='$nombre_empresa' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");
	  }
      else{
      $sql_consulta=mysql_query("SELECT * FROM seguimiento_empresas.responsable_empresa where nombre_empresa='$nombre_empresa' and nombre_empresa LIKE '$txtabuscar%' AND nombre_empresa LIKE '$txtabuscar%' order by iddepartamento;");  
	  }
	  $sqlcon="SELECT COUNT(iddepartamento) AS numero FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by iddepartamento";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta empresa no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}  
  }

while ($row_eliminar=mysql_fetch_array($sql_consulta)){
              $iddepartamento=$row_eliminar['iddepartamento'];		 
									 /////////eliminar departamento
                                      echo '<div class="modal fade" id='.'"'.'eliminar_departamento'.$iddepartamento.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR SOLICITUD</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_personal.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
            
                                      //fin de ventanas modales     
                                     }*/


            //error de logueo
                    echo '<div class="modal fade" id="error_logueo" role="dialog">';
                    echo '  <div class="modal-dialog">';

                    // <!-- Modal content-->
                    echo '    <div class="modal-content">';
                    echo '      <div class="modal-header">';
                    echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                    echo '        <h3 class="modal-title" style="color:red;"><b><center>! Inicia Sesión !</center></b></h3>';
                    echo '      </div>';
                    echo '      <div class="modal-body">';
                    echo '        <h4><b>Para más información: </b><a href="../index.php">Inicia Sesión</a></h4>';
                    echo '        </p>';
                    echo '      </div>';
                    echo '      <div class="modal-footer">';
                    echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                    echo '      </div>';
                    echo '    </div>';
                    
                   echo '   </div>';
                   echo '</div>';
                    // error de logueo     
            
  mysql_close(); 
?>
