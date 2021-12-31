<!--Método para invocar la sesion de una materia antes de manipularlo y si ya esta el materia creada entonces manipular la información-->
<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda de materias por nombre, sector, giro, creditos y direccion
if($_POST['txtabuscar']!=NULL){
    $txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="clave"){
	    $sql="SELECT * FROM materia WHERE clave LIKE '$txtabuscar%' order by clave";
		$sqlcon="SELECT COUNT(clave) AS numero FROM materia WHERE clave LIKE '$txtabuscar%' order by clave";
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
	    $sql="SELECT * FROM materia WHERE nombre LIKE '$txtabuscar%' order by nombre";
		$sqlcon="SELECT COUNT(nombre) AS numero FROM materia WHERE nombre LIKE '$txtabuscar%' order by nombre";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta materia no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="creditos"){
	    $sql="SELECT * FROM materia WHERE creditos LIKE '$txtabuscar%' order by creditos";
		$sqlcon="SELECT COUNT(creditos) AS numero FROM materia WHERE creditos LIKE '$txtabuscar%' order by creditos";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté creditos no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
} 

if(isset($_POST['txtabuscar'])){
  $txtabuscar=$_POST['txtabuscar'];
  $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="clave"){
	    $sql="SELECT * FROM materia WHERE clave LIKE '$txtabuscar%' order by clave";
    }
	if($tipoopcion=="nombre"){
	    $sql="SELECT * FROM materia WHERE nombre LIKE '$txtabuscar%' order by nombre";
    }
    if($tipoopcion=="creditos"){
	    $sql="SELECT * FROM materia WHERE creditos LIKE '$txtabuscar%' order by creditos";
    }
}
$consulta=mysql_query($sql);
        //Inicio tabla responsiva para la consulta de los usuarios
          echo '<table border="0" class="table table-responsive table-hover">';
		     if($_POST['txtabuscar']==NULL){
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="clave"){
						$sql="SELECT * FROM materia WHERE clave LIKE '$txtabuscar%' order by clave";
						$sqlcon="SELECT COUNT(clave) AS numero FROM materia WHERE clave LIKE '$txtabuscar%' order by clave";
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
						$sql="SELECT * FROM materia WHERE nombre LIKE '$txtabuscar%' order by nombre";
						$sqlcon="SELECT COUNT(nombre) AS numero FROM materia WHERE nombre LIKE '$txtabuscar%' order by nombre";
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
					if($tipoopcion=="creditos"){
						$sql="SELECT * FROM materia WHERE creditos LIKE '$txtabuscar%' order by creditos";
						$sqlcon="SELECT COUNT(creditos) AS numero FROM materia WHERE creditos LIKE '$txtabuscar%' order by creditos";
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
					if($tipoopcion=="clave"){
						$sql="SELECT * FROM materia WHERE clave LIKE '$txtabuscar%' order by clave";
					}
					if($tipoopcion=="nombre"){
						$sql="SELECT * FROM materia WHERE nombre LIKE '$txtabuscar%' order by nombre";
					}
					if($tipoopcion=="creditos"){
						$sql="SELECT * FROM materia WHERE creditos LIKE '$txtabuscar%' order by creditos";
					}
				}
                echo '<th>Clave materia</th><th>Nombre</th><th>Creditos</th><th>Ver</th><th>Editar</th><th>Eliminar</th>';
                while ($row=mysql_fetch_array($consulta)){
                  $clave=$row['clave'];
                  echo '<tr>';
					echo '<td>'.utf8_encode($row['clave']).'</td>'.'<td>'.utf8_encode($row['nombre']).'</td>'.'<td>'.utf8_encode($row['creditos']).'</td>';
				 //si usuario ya se registro podra ver la información que le corresponde
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$clave.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
								//línea de codigo para poner el botón con imagen (actualizar materia)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_materia".$clave.'" '.'>';
									  echo '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
								//línea de codigo para poner el botón con imagen (eliminar materia)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_materia".$clave.'" '.'>';
									  echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
                                //mas información de la materia solo usuario registrado podrá ver.
                             //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$clave.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<b><center>'."DATOS DE LA EMPRESA:"." ".$row['clave'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."CLAVE MATERIA:".'</b>'." ".utf8_encode($row['clave']).'<br>'."<b>NOMBRE: </b>"." ".utf8_encode($row['nombre']);
                                echo '        <b>'."<br>CRÉDITOS: </b>"." ".utf8_encode($row['creditos']);
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
                  $clave=$row['clave'];	
                                      ////formulario para editar materia de manera individual
                                      echo ' <!--Ventana para captura de editar materia-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_materia'.$clave.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR MATERIA</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_materia.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
$consulta=mysql_query($sql);                 
                  while ($row=mysql_fetch_array($consulta)){
                  $clave=$row['clave'];
                                      ////formulario para eliminar materia de manera individual
                                      echo ' <!--Ventana para captura de eliminar materia-->';
                                      echo '<div class="modal fade" id='.'"'.'eliminar_materia'.$clave.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR MATERIA</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_materia.php');  ///incluyo el formulario
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