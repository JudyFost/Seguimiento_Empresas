<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda de un usuario por nombre empresa, nombre, apellido paterno, apellido materno y por el nombre del departamento
if($_POST['txtabuscar']!=NULL){
    $txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
	if($tipoopcion=="iddepartamento"){
	    $sql="SELECT * FROM responsable_empresa WHERE iddepartamento LIKE '$txtabuscar%' order by iddepartamento";
		$sqlcon="SELECT COUNT(iddepartamento) AS numero FROM responsable_empresa WHERE iddepartamento LIKE '$txtabuscar%' order by iddepartamento";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Este id de departamento no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
    if($tipoopcion=="nombre_empresa"){
	    $sql="SELECT * FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by iddepartamento";
		$sqlcon="SELECT COUNT(nombre_empresa) AS numero FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by nombre_empresa";
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
	if($tipoopcion=="nombre"){
	    $sql="SELECT * FROM responsable_empresa WHERE nombre LIKE '$txtabuscar%' order by iddepartamento";
		$sqlcon="SELECT COUNT(nombre) AS numero FROM responsable_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta nombre no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="ap"){
	    $sql="SELECT * FROM responsable_empresa WHERE ap LIKE '$txtabuscar%' order by iddepartamento";
		$sqlcon="SELECT COUNT(ap) AS numero FROM responsable_empresa WHERE ap LIKE '$txtabuscar%' order by ap";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta apellido paterno no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="am"){
	    $sql="SELECT * FROM responsable_empresa WHERE am LIKE '$txtabuscar%' order by iddepartamento";
		$sqlcon="SELECT COUNT(am) AS numero FROM responsable_empresa WHERE am LIKE '$txtabuscar%' order by am";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta apellido materno no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="nombre_departamento"){
	    $sql="SELECT * FROM responsable_empresa WHERE nombre_departamento LIKE '$txtabuscar%' order by nombre_departamento";
		$sqlcon="SELECT COUNT(nombre_departamento) AS numero FROM responsable_empresa WHERE nombre_departamento LIKE '$txtabuscar%' order by nombre_departamento";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté departamento no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
}
if(isset($_POST['txtabuscar'])){
  $txtabuscar=$_POST['txtabuscar'];
  $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="iddepartamento"){
        $sql_consulta="SELECT * FROM responsable_empresa WHERE iddepartamento LIKE '$txtabuscar%' order by iddepartamento";
    }
    if($tipoopcion=="nombre_empresa"){
        $sql_consulta="SELECT * FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by iddepartamento";
    }
	if($tipoopcion=="nombre"){
        $sql_consulta="SELECT * FROM responsable_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
    }
	if($tipoopcion=="ap"){
        $sql_consulta="SELECT * FROM responsable_empresa WHERE ap LIKE '$txtabuscar%' order by ap";
    }
	if($tipoopcion=="am"){
        $sql_consulta="SELECT * FROM responsable_empresa WHERE am LIKE '$txtabuscar%' order by am";
    }
    if($tipoopcion=="nombre_departamento"){
        $sql_consulta="SELECT * FROM responsable_empresa WHERE nombre_departamento LIKE '$txtabuscar%' order by nombre_departamento";
    }
}

$consulta1=mysql_query($sql_consulta);
 //Inicio tabla responsiva para la consulta del departamento responsable 
          echo '<table border="0" class="table table-responsive table-hover">';
		    if($_POST['txtabuscar']==NULL){
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="iddepartamento"){
					$sql="SELECT * FROM responsable_empresa WHERE iddepartamento LIKE '$txtabuscar%' order by iddepartamento";
					$sqlcon="SELECT COUNT(iddepartamento) AS numero FROM responsable_empresa WHERE iddepartamento LIKE '$txtabuscar%' order by iddepartamento";
					$consultacon=mysql_query($sqlcon);		
					while ($rowcon=mysql_fetch_array($consultacon)){
						$numero=$rowcon['numero'];
						if($numero==0){ 
						echo "<center>";
							echo '<div class="alert alert-danger">';
							echo '<strong>¡No hay datos por mostrar!</strong>, Agregue un departamento';
							echo '</div>';
							exit();
						}
					}
				}
					if($tipoopcion=="nombre_empresa"){
						$sql="SELECT * FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by iddepartamento";
						$sqlcon="SELECT COUNT(nombre_empresa) AS numero FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by nombre_empresa";
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
						$sql="SELECT * FROM responsable_empresa WHERE nombre LIKE '$txtabuscar%' order by iddepartamento";
						$sqlcon="SELECT COUNT(nombre) AS numero FROM responsable_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
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
					if($tipoopcion=="ap"){
						$sql="SELECT * FROM responsable_empresa WHERE ap LIKE '$txtabuscar%' order by iddepartamento";
						$sqlcon="SELECT COUNT(ap) AS numero FROM responsable_empresa WHERE ap LIKE '$txtabuscar%' order by ap";
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
					if($tipoopcion=="am"){
						$sql="SELECT * FROM responsable_empresa WHERE am LIKE '$txtabuscar%' order by iddepartamento";
						$sqlcon="SELECT COUNT(am) AS numero FROM responsable_empresa WHERE am LIKE '$txtabuscar%' order by am";
						$consultacon=mysql_query($sqlcon);		
						while ($rowcon=mysql_fetch_array($consultacon)){
							$numero=$rowcon['numero'];
							if($numero==0){ 
							echo "<center>";
								echo '<div class="alert alert-danger">';
								echo '<strong>No hay datos por mostrar</strong>';
								echo '</div>';
								exit();
							}
						}
					}
					if($tipoopcion=="nombre_departamento"){
						$sql="SELECT * FROM responsable_empresa WHERE nombre_departamento LIKE '$txtabuscar%' order by nombre_departamento";
						$sqlcon="SELECT COUNT(nombre_departamento) AS numero FROM responsable_empresa WHERE nombre_departamento LIKE '$txtabuscar%' order by nombre_departamento";
						$consultacon=mysql_query($sqlcon);		
						while ($rowcon=mysql_fetch_array($consultacon)){
							$numero=$rowcon['numero'];
							if($numero==0){ 
							echo "<center>";
								echo '<div class="alert alert-danger">';
								echo '<strong>No hay datos por mostrar</strong>';
								echo '</div>';
								exit();
							}
						}
					}
				}
				if(isset($_POST['txtabuscar'])){
				  $txtabuscar=$_POST['txtabuscar'];
				  $tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="nombre_empresa"){
						$sql_consulta="SELECT * FROM responsable_empresa WHERE nombre_empresa LIKE '$txtabuscar%' order by iddepartamento";
					}
					if($tipoopcion=="nombre"){
						$sql_consulta="SELECT * FROM responsable_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
					}
					if($tipoopcion=="ap"){
						$sql_consulta="SELECT * FROM responsable_empresa WHERE ap LIKE '$txtabuscar%' order by ap";
					}
					if($tipoopcion=="am"){
						$sql_consulta="SELECT * FROM responsable_empresa WHERE am LIKE '$txtabuscar%' order by am";
					}
					if($tipoopcion=="nombre_departamento"){
						$sql_consulta="SELECT * FROM responsable_empresa WHERE nombre_departamento LIKE '$txtabuscar%' order by nombre_departamento";
					}
				}
				echo '<th>Id departamento</th><th>Empresa</th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th><th>Departamento</th><th>Ver</th><th>Editar</th><th>Eliminar</th>';
                while ($row_consulta=mysql_fetch_array($consulta1)){
                  $iddepartamento=$row_consulta['iddepartamento'];
                  echo '<tr>';
				    echo '<td>'.$row_consulta['iddepartamento'].'</td>';
				    echo '<td>'.utf8_encode($row_consulta['nombre_empresa']).'</td>';
					echo '<td>'.utf8_encode($row_consulta['nombre']).'</td>';
					echo '<td>'.utf8_encode($row_consulta['ap']).'</td>';
					echo '<td>'.utf8_encode($row_consulta['am']).'</td>';
					//echo '<td>'.utf8_encode($row_consulta['nombre'])." ".utf8_encode($row_consulta['ap'])." ".utf8_encode($row_consulta['am']).'</td>';
					echo '<td>'.utf8_encode($row_consulta['nombre_departamento']).'</td>';		
				    //si usuario ya se registro podra ver la información que le corresponde
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$iddepartamento.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
								//línea de codigo para poner el botón con imagen (actualizar responsable)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_departamento".$iddepartamento.'" '.'>';
									  echo '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
								
								//línea de codigo para poner el botón con imagen (eliminar responsable)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_departamento".$iddepartamento.'" '.'>';
									  //echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;">'.$iddepartamento.'</i>';
									  echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
                                //mas información de la empresa solo usuario registrado podrá ver.
                             //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$iddepartamento.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<b><center>'."FOLIO DE SOLICITUD:"." ".$row_consulta['iddepartamento'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."EMPRESA:".'</b>'." ".utf8_encode($row_consulta['nombre_empresa']).'<br>'."<b>RESPONSABLE: </b>"." ".$row_consulta['nombre']." ".$row_consulta['ap']." ".$row_consulta['am'];
                                echo '        <b>'."<br>DEPARTAMENTO: </b>"." ".$row_consulta['nombre_departamento'];
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
				
//generando ventanas modales para eliminar departamento.              
$consulta2=mysql_query($sql_consulta);                 
                  while ($row_actualizar=mysql_fetch_array($consulta2)){
                  $iddepartamento=$row_actualizar['iddepartamento'];
				                      ////formulario con ventana modal para editar departamento de manera individual
                                      echo ' <!--Ventana para captura de editar departamento-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_departamento'.$iddepartamento.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR DEPARTAMENTO</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_departamento.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
$consulta3=mysql_query($sql_consulta);                 
                  while ($row_eliminar=mysql_fetch_array($consulta3)){
                  $iddepartamento=$row_eliminar['iddepartamento'];
                                      ////formulario con ventana modal para Eliminar departamento de manera individual
                                      echo ' <!--Ventana para captura de Eliminar departamento-->';
                                      echo '<div class="modal fade" id='.'"'.'eliminar_departamento'.$iddepartamento.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR DEPARTAMENTO</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_departamento.php');  ///incluyo el formulario
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

  
  