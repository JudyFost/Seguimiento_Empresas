<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
if($_POST['txtabuscar']!=NULL){
    $txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="clave_carrera"){
	    $sql="SELECT * FROM division_especialidad WHERE clave_carrera LIKE '$txtabuscar%' order by iddivision";
		$sqlcon="SELECT COUNT(clave_carrera) AS numero FROM division_especialidad WHERE clave_carrera LIKE '$txtabuscar%' order by clave_carrera";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta clave carrera no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="nombre_carrera"){
	    $sql="SELECT * FROM division_especialidad WHERE nombre_carrera LIKE '$txtabuscar%' order by nombre_carrera";
		$sqlcon="SELECT COUNT(nombre_carrera) AS numero FROM division_especialidad WHERE nombre_carrera LIKE '$txtabuscar%' order by nombre_carrera";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta división no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="idespecialidad"){
	    $sql="SELECT * FROM division_especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
		$sqlcon="SELECT COUNT(idespecialidad) AS numero FROM division_especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
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
}
if(isset($_POST['txtabuscar'])){
  $txtabuscar=$_POST['txtabuscar'];
  $tipoopcion=$_POST['tipoopcion'];
      if($tipoopcion=="clave_carrera"){
        $sql_consulta="SELECT * FROM division_especialidad WHERE clave_carrera LIKE '$txtabuscar%' order by iddivision";
    }
    if($tipoopcion=="nombre_carrera"){
        $sql_consulta="SELECT * FROM division_especialidad WHERE nombre_carrera LIKE '$txtabuscar%' order by nombre_carrera";
    }
	if($tipoopcion=="idespecialidad"){
        $sql_consulta="SELECT * FROM division_especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
    }
}
$consulta1=mysql_query($sql_consulta);
          echo '<table border="0" class="table table-responsive table-hover">';
		        if($_POST['txtabuscar']==NULL){
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="clave_carrera"){
						$sql="SELECT * FROM division_especialidad WHERE clave_carrera LIKE '$txtabuscar%' order by iddivision";
						$sqlcon="SELECT COUNT(clave_carrera) AS numero FROM division_especialidad WHERE clave_carrera LIKE '$txtabuscar%' order by clave_carrera";
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
					if($tipoopcion=="nombre_carrera"){
						$sql="SELECT * FROM division_especialidad WHERE nombre_carrera LIKE '$txtabuscar%' order by nombre_carrera";
						$sqlcon="SELECT COUNT(nombre_carrera) AS numero FROM division_especialidad WHERE nombre_carrera LIKE '$txtabuscar%' order by nombre_carrera";
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
					if($tipoopcion=="idespecialidad"){
						$sql="SELECT * FROM division_especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
						$sqlcon="SELECT COUNT(idespecialidad) AS numero FROM division_especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
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
					  if($tipoopcion=="clave_carrera"){
						$sql_consulta="SELECT * FROM division_especialidad WHERE clave_carrera LIKE '$txtabuscar%' order by iddivision";
					}
					if($tipoopcion=="nombre_carrera"){
						$sql_consulta="SELECT * FROM division_especialidad WHERE nombre_carrera LIKE '$txtabuscar%' order by nombre_carrera";
					}
					if($tipoopcion=="idespecialidad"){
						$sql_consulta="SELECT * FROM division_especialidad WHERE idespecialidad LIKE '$txtabuscar%' order by idespecialidad";
					}
				}
                echo '<th>Clave</th><th>Nombre</th><th>Especialidad</th><th>Ver</th><th>Editar</th><th>Eliminar</th>';
                while ($row_consulta=mysql_fetch_array($consulta1)){
                  $iddivision=$row_consulta['iddivision'];
                  echo '<tr>';
				    echo '<td>'.$row_consulta['clave_carrera'].'</td>';
                    echo '<td>'.utf8_encode($row_consulta['nombre_carrera']).'</td>'." ".'<td>'.$row_consulta['idespecialidad'].'</td>';
				 //si usuario ya se registro podra ver la información que le corresponde
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
											echo '<td>';
												echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$iddivision.'" '.'>';
												echo '<i class="fa fa-search" aria-hidden="true"></i>';
												echo '</button>';
											echo '</td>';
											 //línea de codigo para poner el botón con imagen (editar carrera)                   
											   echo '<td>';
												  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_division".$iddivision.'" '.'>';
													  echo '<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#2E9AFE;"></i>';
												  echo '</buttton>';    
												echo '</td>';
												//línea de codigo para poner el botón con imagen (eliminar carrera)
												echo '<td>';
													echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_division".$iddivision.'" '.'>';
													  echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i>';
													echo '</buttton>';    
												echo '</td>';
							   
											//mas información de la carrera solo usuario registrado podrá ver.
										 //    <!-- Modal -->
											echo '<div class="modal fade" id='.'"'.$iddivision.'" '.'role="dialog">';
											echo '  <div class="modal-dialog">';
											  
											   // <!-- Modal content-->
											echo '    <div class="modal-content">';
											echo '      <div class="modal-header">';
											echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
											echo '        <h4 class="modal-title">'.'<b><center>'."DATOS DE LA DIVISIÓN:"." ".$row_consulta['iddivision'].'</b>'.'</center>'.'</h4>';
											echo '      </div>';
											echo '      <div class="modal-body">';
											echo '       <p><b>'."CLAVE:".'</b>'." ".utf8_encode($row_consulta['clave_carrera']).'<br>'."<b>NOMBRE: </b>"." ".utf8_encode($row_consulta['nombre_carrera']).'<br>'."<b>ESPECIALIDAD: </b>"." ".utf8_encode($row_consulta['idespecialidad']); 
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
//generando ventanas modales para editar y ver mas informacion.                
$consulta2=mysql_query($sql_consulta);                 
                  while ($row_actualizar=mysql_fetch_array($consulta2)){
                       $iddivision=$row_actualizar['iddivision'];
                                      ////formulario para editar division de manera individual
                                      echo ' <!--Ventana para captura de editar division-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_division'.$iddivision.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR DIVISION</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_division.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
$consulta3=mysql_query($sql_consulta);                 
                  while ($row_eliminar=mysql_fetch_array($consulta3)){
                       $iddivision=$row_eliminar['iddivision'];
                                  ////formulario para eliminar division de manera individual
                                      echo ' <!--Ventana para captura de eliminar division-->';
                                      echo '<div class="modal fade" id='.'"'.'eliminar_division'.$iddivision.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR DIVISION</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_division.php');  ///incluyo el formulario
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