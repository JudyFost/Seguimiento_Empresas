<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda de especialidades de las materias por idespecialidad, clave_materia
if($_POST['txtabuscar']!=NULL){
    $txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="idespecialidad"){
	    $sql="SELECT * FROM vista_especialidad_materia  WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
		$sqlcon="SELECT COUNT(idespecialidad) AS numero FROM vista_especialidad_materia WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta especialidad no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="clave_materia"){
	    $sql="SELECT * FROM vista_especialidad_materia WHERE clave_materia LIKE '$txtabuscar%' order by clave_materia";
		$sqlcon="SELECT COUNT(clave_materia) AS numero FROM vista_especialidad_materia WHERE clave_materia LIKE '$txtabuscar%' order by clave_materia";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta clave materia no existe, Verifique sus datos';
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
        $sql_consulta="SELECT * FROM vista_especialidad_materia  WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
    }
    if($tipoopcion=="clave_materia"){
        $sql_consulta="SELECT * FROM vista_especialidad_materia WHERE clave_materia LIKE '$txtabuscar%' order by clave_materia";
    }
}
if(!isset($_POST['txtabuscar'])){
 $sql_consulta="SELECT * FROM vista_especialidad_materia order by idespecialidad";
}
$consulta1=mysql_query($sql_consulta);
            echo '<table border="0" class="table table-responsive table-hover">';
                if($_POST['txtabuscar']==NULL){
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="idespecialidad"){
						$sql="SELECT * FROM vista_especialidad_materia  WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
						$sqlcon="SELECT COUNT(idespecialidad) AS numero FROM vista_especialidad_materia WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
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
					if($tipoopcion=="clave_materia"){
						$sql="SELECT * FROM vista_especialidad_materia WHERE clave_materia LIKE '$txtabuscar%' order by clave_materia";
						$sqlcon="SELECT COUNT(clave_materia) AS numero FROM vista_especialidad_materia WHERE clave_materia LIKE '$txtabuscar%' order by clave_materia";
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
						$sql_consulta="SELECT * FROM vista_especialidad_materia  WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
					}
					if($tipoopcion=="clave_materia"){
						$sql_consulta="SELECT * FROM vista_especialidad_materia WHERE clave_materia LIKE '$txtabuscar%' order by clave_materia";
					}
				}		     
				echo '<th>Especialidad</th><th>Clave materia</th><th>Ver</th><th>Editar</th><th>Eliminar</th>';
                while ($row_consulta=mysql_fetch_array($consulta1)){
                  $idespecialidad_materia=$row_consulta['idespecialidad_materia'];
                  echo '<tr>';
					echo '<td>'.$row_consulta['idespecialidad'].'</td>';
					echo '<td>'.$row_consulta['clave_materia'].'</td>';
				    //si usuario ya se registro podra ver la información que le corresponde
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$idespecialidad_materia.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
                                //línea de codigo para poner el botón con imagen (actualizar especialidad materia)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_especialidadmateria".$idespecialidad_materia.'" '.'>';
									  echo '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
								
								//línea de codigo para poner el botón con imagen (eliminar especialidad materia)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_especialidadmateria".$idespecialidad_materia.'" '.'>';
									  echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
                                //mas información de la especialidad materia que solo el usuario registrado podrá ver.
                             //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$idespecialidad_materia.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<b><center>'."FOLIO DE SOLICITUD:"." ".$row_consulta['idespecialidad_materia'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."ESPECIALIDAD:".'</b>'." ".utf8_encode($row_consulta['idespecialidad']).'<br>'."<b>MATERIA: </b>"." ".$row_consulta['clave_materia'];
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
                //generando ventanas modales para eliminar especialidad materia. 
              
$consulta2=mysql_query($sql_consulta);                 
                  while ($row_actualizar=mysql_fetch_array($consulta2)){
                  $idespecialidad_materia=$row_actualizar['idespecialidad_materia'];
				                      ////formulario con ventana modal para editar especialidad materia de manera individual
                                      echo ' <!--Ventana para captura de editar especialidad materia-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_especialidadmateria'.$idespecialidad_materia.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR ESPECIALIDAD MATERIA</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_especialidadmateria.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
$consulta3=mysql_query($sql_consulta);                 
                  while ($row_eliminar=mysql_fetch_array($consulta3)){
                  $idespecialidad_materia=$row_eliminar['idespecialidad_materia'];  
                                      ////formulario con ventana modal para Eliminar especialidad materia de manera individual
                                      echo ' <!--Ventana para captura de editar especialidad materia-->';
                                      echo '<div class="modal fade" id='.'"'.'eliminar_especialidadmateria'.$idespecialidad_materia.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR ESPECIALIDAD MATERIA</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_especialidadmateria.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
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
                        echo '        <h4><center><b>Para más información: </b><a href="../index.php">Inicia Sesion</a></center></h4>';
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