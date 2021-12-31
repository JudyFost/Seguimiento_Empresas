<!--Método para invocar la sesion de una historial alumno antes de manipularlo y si ya esta el empresa creada entonces manipular la información-->
<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda de un alumno por idcontrol, semestre, seguro facultativo, creditos actuales, situacion alumno y clave del tipo de alumno
if($_POST['txtabuscar']!=NULL){
    $txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="idcontrol"){
	    $sql="SELECT * FROM historial_alumno WHERE idcontrol LIKE '$txtabuscar%' order by idcontrol";
		$sqlcon="SELECT COUNT(idcontrol) AS numero FROM historial_alumno WHERE idcontrol LIKE '$txtabuscar%' order by idcontrol";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté No. Control no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="semestre"){
	    $sql="SELECT * FROM historial_alumno WHERE semestre LIKE '$txtabuscar%' order by semestre";
		$sqlcon="SELECT COUNT(semestre) AS numero FROM historial_alumno WHERE semestre LIKE '$txtabuscar%' order by semestre";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté semestre no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="seguro_facultativo"){
	    $sql="SELECT * FROM historial_alumno WHERE seguro_facultativo LIKE '$txtabuscar%' order by seguro_facultativo";
		$sqlcon="SELECT COUNT(seguro_facultativo) AS numero FROM historial_alumno WHERE seguro_facultativo LIKE '$txtabuscar%' order by seguro_facultativo";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté seguro facultativo no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="creditos_actuales"){
	    $sql="SELECT * FROM historial_alumno WHERE creditos_actuales LIKE '$txtabuscar%' order by creditos_actuales";
		$sqlcon="SELECT COUNT(creditos_actuales) AS numero FROM historial_alumno WHERE creditos_actuales LIKE '$txtabuscar%' order by creditos_actuales";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté total de créditos no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="situacion_alumno"){
	    $sql="SELECT * FROM historial_alumno WHERE situacion_alumno_clave LIKE '$txtabuscar%' order by situacion_alumno_clave";
		$sqlcon="SELECT COUNT(situacion_alumno_clave) AS numero FROM historial_alumno WHERE situacion_alumno_clave LIKE '$txtabuscar%' order by situacion_alumno_clave";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta situación no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="clave_tipoalu"){
	    $sql="SELECT * FROM historial_alumno WHERE clave_tipoalu LIKE '$txtabuscar%' order by clave_tipoalu";
		$sqlcon="SELECT COUNT(clave_tipoalu) AS numero FROM historial_alumno WHERE clave_tipoalu LIKE '$txtabuscar%' order by clave_tipoalu";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté tipo de alumno no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
}
else{
	$txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="idcontrol"){
	    $sql="SELECT * FROM historial_alumno WHERE idcontrol LIKE '$txtabuscar%' order by idcontrol";
    }
	if($tipoopcion=="semestre"){
	    $sql="SELECT * FROM historial_alumno WHERE semestre LIKE '$txtabuscar%' order by semestre";
    }
	if($tipoopcion=="seguro_facultativo"){
	    $sql="SELECT * FROM historial_alumno WHERE seguro_facultativo LIKE '$txtabuscar%' order by seguro_facultativo";
    }
	if($tipoopcion=="creditos_actuales"){
	    $sql="SELECT * FROM historial_alumno WHERE creditos_actuales LIKE '$txtabuscar%' order by creditos_actuales";
    }
	if($tipoopcion=="situacion_alumno"){
	    $sql="SELECT * FROM historial_alumno WHERE situacion_alumno_clave LIKE '$txtabuscar%' order by situacion_alumno_clave";
    }
	if($tipoopcion=="clave_tipoalu"){
	    $sql="SELECT * FROM historial_alumno WHERE clave_tipoalu LIKE '$txtabuscar%' order by clave_tipoalu";
    }
}
$consulta=mysql_query($sql);		
        //Inicio tabla responsiva para la consulta historial académico
          echo '<table border="0" class="table table-responsive table-hover">';
		    if($_POST['txtabuscar']==NULL){
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="idcontrol"){
						$sql="SELECT * FROM historial_alumno WHERE idcontrol LIKE '$txtabuscar%' order by idcontrol";
						$sqlcon="SELECT COUNT(idcontrol) AS numero FROM historial_alumno WHERE idcontrol LIKE '$txtabuscar%' order by idcontrol";
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
					if($tipoopcion=="semestre"){
						$sql="SELECT * FROM historial_alumno WHERE semestre LIKE '$txtabuscar%' order by semestre";
						$sqlcon="SELECT COUNT(semestre) AS numero FROM historial_alumno WHERE semestre LIKE '$txtabuscar%' order by semestre";
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
					if($tipoopcion=="seguro_facultativo"){
						$sql="SELECT * FROM historial_alumno WHERE seguro_facultativo LIKE '$txtabuscar%' order by seguro_facultativo";
						$sqlcon="SELECT COUNT(seguro_facultativo) AS numero FROM historial_alumno WHERE seguro_facultativo LIKE '$txtabuscar%' order by seguro_facultativo";
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
					if($tipoopcion=="creditos_actuales"){
						$sql="SELECT * FROM historial_alumno WHERE creditos_actuales LIKE '$txtabuscar%' order by creditos_actuales";
						$sqlcon="SELECT COUNT(creditos_actuales) AS numero FROM historial_alumno WHERE creditos_actuales LIKE '$txtabuscar%' order by creditos_actuales";
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
					if($tipoopcion=="situacion_alumno"){
						$sql="SELECT * FROM historial_alumno WHERE situacion_alumno_clave LIKE '$txtabuscar%' order by situacion_alumno_clave";
						$sqlcon="SELECT COUNT(situacion_alumno_clave) AS numero FROM historial_alumno WHERE situacion_alumno_clave LIKE '$txtabuscar%' order by situacion_alumno_clave";
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
					if($tipoopcion=="clave_tipoalu"){
						$sql="SELECT * FROM historial_alumno WHERE clave_tipoalu LIKE '$txtabuscar%' order by clave_tipoalu";
						$sqlcon="SELECT COUNT(clave_tipoalu) AS numero FROM historial_alumno WHERE clave_tipoalu LIKE '$txtabuscar%' order by clave_tipoalu";
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
				else{
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="idcontrol"){
						$sql="SELECT * FROM historial_alumno WHERE idcontrol LIKE '$txtabuscar%' order by idcontrol";
					}
					if($tipoopcion=="semestre"){
						$sql="SELECT * FROM historial_alumno WHERE semestre LIKE '$txtabuscar%' order by semestre";
					}
					if($tipoopcion=="seguro_facultativo"){
						$sql="SELECT * FROM historial_alumno WHERE seguro_facultativo LIKE '$txtabuscar%' order by seguro_facultativo";
					}
					if($tipoopcion=="creditos_actuales"){
						$sql="SELECT * FROM historial_alumno WHERE creditos_actuales LIKE '$txtabuscar%' order by creditos_actuales";
					}
					if($tipoopcion=="situacion_alumno"){
						$sql="SELECT * FROM historial_alumno WHERE situacion_alumno_clave LIKE '$txtabuscar%' order by situacion_alumno_clave";
					}
					if($tipoopcion=="clave_tipoalu"){
						$sql="SELECT * FROM historial_alumno WHERE clave_tipoalu LIKE '$txtabuscar%' order by clave_tipoalu";
					}
				}
                echo '<th>No. Control</th><th>Semestre</th><th>Seguro facultativo</th><th>Creditos actuales</th><th>Situación del alumno</th><th>Tipo de alumno</th><th>Ver</th><th>Editar</th><th>Eliminar</th>';
                while ($row=mysql_fetch_array($consulta)){
                  $idcontrol=$row['idcontrol'];  
                  echo '<tr>';
					echo '<td>'.utf8_encode($row['idcontrol']).'</td>'.'<td>'.$row['semestre'].'</td>'.'<td>'.utf8_encode($row['seguro_facultativo']).'</td>';
                    echo '<td>'.utf8_encode($row['creditos_actuales']).'</td>';
					echo '<td>'.$row['situacion_alumno_clave'];
					   include("../include/conexion.php");
					   //Uso de la condicional if para asignar situacion historial_alumno 
						        if($row['situacion_alumno']=="A"){
							    echo '<b>ACTIVO</b>';
							     }
				                if($row['situacion_alumno']=="B"){
							    echo '<b>BAJA</b>';
							     }
								if($row['situacion_alumno']=="BT"){
							    echo '<b>BAJA TEMPORAL</b>';
							     }
                                if($row['situacion_alumno']=="E"){
							    echo '<b>EGRESADO</b>';
							     }								 			
					echo '</td>';
					echo '<td>'.$row['clave_tipoalu'];
					   include("../include/conexion.php");
					   //Uso de la condicional if para asignar tipo historial_alumno
						        if($row['tipo_alumno']=="AA"){
							    echo '<b>ALUMNO EXTENSION ACULCO</b>';
							     }
				                if($row['tipo_alumno']=="AE"){
							    echo '<b>ALUMNO EXTERNO TESJO</b>';
							     }
								if($row['tipo_alumno']=="AI"){
							    echo '<b>ALUMNO INTERNO TESJO</b>';
							     }
                                if($row['tipo_alumno']=="AQ"){
							    echo '<b>ALUMNO EQUIVALENCIA</b>';
							     }
                                if($row['tipo_alumno']=="EI"){
							    echo '<b>ALUMNO EGRESADO</b>';
							     }								 				
					echo '</td>';
				    //si usuario ya se registro podra ver la información que le corresponde
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$idcontrol.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
								//línea de codigo para poner el botón con imagen (actualizar historial_alumno)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_historial".$idcontrol.'" '.'>';
									  echo '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
								//línea de codigo para poner el botón con imagen (eliminar historial_alumno)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_historial".$idcontrol.'" '.'>';
									  echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
                                //mas información del historial del alumno que solo usuario registrado podrá ver.
                                //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$idcontrol.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<b><center>'."No. CONTROL:"." ".$row['idcontrol'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."No.  CONTROL:".'</b>'." ".utf8_encode($row['idcontrol']).'<br>'."<b>SEMESTRE: </b>"." ".$row['semestre'];        
                                echo '        <b>'."<br>SEGURO FACULTATIVO: </b>"." ".utf8_encode($row['seguro_facultativo']).'<br>'."<b>CRÉDITOS ACTUALES: </b>"." ".utf8_encode($row['creditos_actuales']);
                                echo '        <b>'."<br>SITUACIÓN DEL ALUMNO: </b>"." ".$row['situacion_alumno_clave'];
                                echo '        <b>'."<br>TIPO DE ALUMNO: </b>"." ".$row['clave_tipoalu'];
                                echo '        <b>'."<br>CARRERA: </b>"." ".utf8_encode($row['nombre']).'<br>'."<b>SERVICIO SOCIAL: </b>"." ".$row['servicio_social'];
                                echo '        <b>'."<br>RESIDENCIA PROFESIONAL: </b>"." ".$row['residencia_profesional'];
								echo '        <b>'."<br>PROYECTO DÚAL: </b>"." ".$row['proyecto_dual'];
                                echo '       </p>';
                                echo '      </div>';
                                echo '      <div class="modal-footer">';
                                echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                                echo '      </div>';
                                echo '    </div>';
                                
                               echo '   </div>';
                               echo '</div>';                 
                            } // fin de más información
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
        echo '</table>';    //Cerrar tabla
//generando ventanas modales para editar y ver más información.  	
$consulta=mysql_query($sql);                 
                while ($row=mysql_fetch_array($consulta)){
                $idcontrol=$row['idcontrol'];	
                                      ////formulario para editar empresa de manera individual
                                      echo ' <!--Ventana para captura de editar historial-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_historial'.$idcontrol.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR SEGUIMIENTO ACADÉMICO</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_historial.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
$consulta=mysql_query($sql);                 
                while ($row=mysql_fetch_array($consulta)){
                $idcontrol=$row['idcontrol'];
                                      ////formulario para eliminar historial del alumno de manera individual
                                      echo ' <!--Ventana para captura de eliminar historial-->';
                                      echo '<div class="modal fade" id='.'"'.'eliminar_historial'.$idcontrol.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR SEGUIMIENTO ACADÉMICO</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_historial.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }   //fin de ventanas modales                

                        //error de logueo
                        echo '<div class="modal fade" id="error_logueo" role="dialog">';
                        echo '  <div class="modal-dialog">';
                          
                        // <!-- Modal content-->
                        echo '<div class="modal-content">';
                        echo '  <div class="modal-header">';
                        echo '     <button type="button" class="close" data-dismiss="modal">&times;</button>';
                        echo '        <h3 class="modal-title" style="color:red;"><b><center>! Inicia Sesion !</center></b></h3>';
                        echo '     </div>';
                        echo '     <div class="modal-body">';
                        echo '        <h4><b>Para más información: </b><a href="../index.php">Inicia Sesion</a></h4>';
                        echo '     </div>';
                        echo '    </div>'; 
                        echo '  </div>';
                        echo '</div>';
                       // error de logueo     
  mysql_close();              
  ?>	