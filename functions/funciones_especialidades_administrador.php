<!--Método para invocar la sesion de una especialidad antes de manipularlo y si ya esta el especialidad creada entonces manipular la información-->
<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda de especialidads por nombre, sector, giro, descripcion y direccion
if($_POST['txtabuscar']!=NULL){
    $txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="idespecialidad"){
	    $sql="SELECT * FROM especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
		$sqlcon="SELECT COUNT(idespecialidad) AS numero FROM especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta clave no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="nombre"){
	    $sql="SELECT * FROM especialidad WHERE nombre LIKE '$txtabuscar%' order by nombre";
		$sqlcon="SELECT COUNT(nombre) AS numero FROM especialidad WHERE nombre LIKE '$txtabuscar%' order by nombre";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté nombre no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="descripcion"){
	    $sql="SELECT * FROM especialidad WHERE descripcion LIKE '$txtabuscar%' order by descripcion";
		$sqlcon="SELECT COUNT(descripcion) AS numero FROM especialidad WHERE descripcion LIKE '$txtabuscar%' order by descripcion";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta descripcion no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
} 

if(isset($_POST['txtabuscar'])){
  $txtabuscar=$_POST['txtabuscar'];
  $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="idespecialidad"){
	    $sql="SELECT * FROM especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
    }
	if($tipoopcion=="nombre"){
	    $sql="SELECT * FROM especialidad WHERE nombre LIKE '$txtabuscar%' order by nombre";
    }
    if($tipoopcion=="descripcion"){
	    $sql="SELECT * FROM especialidad WHERE descripcion LIKE '$txtabuscar%' order by descripcion";
    }
}
$consulta=mysql_query($sql);
        //Inicio tabla responsiva para la consulta de los usuarios
          echo '<table border="0" class="table table-responsive table-hover">';
		     if($_POST['txtabuscar']==NULL){
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="idespecialidad"){
						$sql="SELECT * FROM especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
						$sqlcon="SELECT COUNT(idespecialidad) AS numero FROM especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
						$consultacon=mysql_query($sqlcon);		
						while ($rowcon=mysql_fetch_array($consultacon)){
							$numero=$rowcon['numero'];
							if($numero==0){ 
							echo "<center>";
								echo '<div class="alert alert-danger">';
								echo '<strong>¡No hay datos por mostrar!</strong>';
								echo '</div>';
								exit();
							}
						}
					}
					if($tipoopcion=="nombre"){
						$sql="SELECT * FROM especialidad WHERE nombre LIKE '$txtabuscar%' order by nombre";
						$sqlcon="SELECT COUNT(nombre) AS numero FROM especialidad WHERE nombre LIKE '$txtabuscar%' order by nombre";
						$consultacon=mysql_query($sqlcon);		
						while ($rowcon=mysql_fetch_array($consultacon)){
							$numero=$rowcon['numero'];
							if($numero==0){ 
							echo "<center>";
								echo '<div class="alert alert-danger">';
								echo '<strong>¡No hay datos por mostrar!</strong>';
								echo '</div>';
								exit();
							}
						}
					}
					if($tipoopcion=="descripcion"){
						$sql="SELECT * FROM especialidad WHERE descripcion LIKE '$txtabuscar%' order by descripcion";
						$sqlcon="SELECT COUNT(descripcion) AS numero FROM especialidad WHERE descripcion LIKE '$txtabuscar%' order by descripcion";
						$consultacon=mysql_query($sqlcon);		
						while ($rowcon=mysql_fetch_array($consultacon)){
							$numero=$rowcon['numero'];
							if($numero==0){ 
							echo "<center>";
								echo '<div class="alert alert-danger">';
								echo '<strong>¡No hay datos por mostrar!</strong>';
								echo '</div>';
								exit();
							}
						}
					}
				} 

				if(isset($_POST['txtabuscar'])){
				  $txtabuscar=$_POST['txtabuscar'];
				  $tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="idespecialidad"){
						$sql="SELECT * FROM especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
					}
					if($tipoopcion=="nombre"){
						$sql="SELECT * FROM especialidad WHERE nombre LIKE '$txtabuscar%' order by nombre";
					}
					if($tipoopcion=="descripcion"){
						$sql="SELECT * FROM especialidad WHERE descripcion LIKE '$txtabuscar%' order by descripcion";
					}
				}
                echo '<th>Clave</th><th>Nombre</th><th>Descripción</th><th>Ver</th><th>Editar</th><th>Eliminar</th>';
                while ($row=mysql_fetch_array($consulta)){
                  $idespecialidad=$row['idespecialidad'];
                  echo '<tr>';
					echo '<td>'.utf8_encode($row['idespecialidad']).'</td>'.'<td>'.utf8_encode($row['nombre']).'</td>'.'<td>'.utf8_encode($row['descripcion']).'</td>';
				 //si usuario ya se registro podra ver la información que le corresponde
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$idespecialidad.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
								//línea de codigo para poner el botón con imagen (actualizar especialidad)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_especialidad".$idespecialidad.'" '.'>';
									  echo '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
								//línea de codigo para poner el botón con imagen (eliminar especialidad)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_especialidad".$idespecialidad.'" '.'>';
									  //echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;">'.$idespecialidad.'</i>';
									  echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
                                //mas información de la especialidad solo usuario registrado podrá ver.
                             //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$idespecialidad.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<b><center>'."FOLIO DE SOLICITUD:"." ".$row['idespecialidad'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."CLAVE:".'</b>'." ".utf8_encode($row['idespecialidad']).'<br>'."<b>NOMBRE: </b>"." ".$row['nombre'];
                                echo '        <b>'."<br>CRÉDITOS: </b>"." ".utf8_encode($row['descripcion']);
                                echo '       </p>';
                                echo '      </div>';
                                echo '      <div class="modal-footer">';
                                echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                                echo '      </div>';
                                echo '    </div>';
                                
                               echo '   </div>';
                               echo '</div>';                 
                                 // fin de mas información
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
				//Cerrar tabla
//generando ventanas modales para editar y ver más información.    			
$consulta=mysql_query($sql);                 
                  while ($row=mysql_fetch_array($consulta)){
                  $idespecialidad=$row['idespecialidad'];	
                                      ////formulario para editar especialidad de manera individual
                                      echo ' <!--Ventana para captura de editar especialidad-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_especialidad'.$idespecialidad.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR especialidad</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_especialidad.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
$consulta=mysql_query($sql);                 
                  while ($row=mysql_fetch_array($consulta)){
                  $idespecialidad=$row['idespecialidad'];
                                      ////formulario para eliminar especialidad de manera individual
                                      echo ' <!--Ventana para captura de eliminar especialidad-->';
                                      echo '<div class="modal fade" id='.'"'.'eliminar_especialidad'.$idespecialidad.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR especialidad</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_especialidad.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
 //fin de ventanas modales                

                        //error de logueo
                        echo '<div class="modal fade" id="error_logueo" role="dialog">';
                        echo '  <div class="modal-dialog">';
                          
                        // <!-- Modal content-->
                        echo '    <div class="modal-content">';
                        echo '      <div class="modal-header">';
                        echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                        echo '        <h3 class="modal-title" style="color:red;"><b><center>! Inicia Sesion !</center></b></h3>';
                        echo '      </div>';
                        echo '      <div class="modal-body">';
                        echo '        <h4><b>Para más información: </b><a href="../index.php">Inicia Sesion</a></h4>';
                        echo '        </p>';
                        echo '      </div>';
                        echo '    </div>';
                        
                       echo '   </div>';
                       echo '</div>';
                        // error de logueo     
  mysql_close();              
  ?>	