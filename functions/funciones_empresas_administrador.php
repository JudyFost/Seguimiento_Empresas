<!--Método para invocar la sesion de una empresa antes de manipularlo y si ya esta el empresa creada entonces manipular la información-->
<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda de empresas por nombre, sector, giro, rfc y direccion
if($_POST['txtabuscar']!=NULL){
    $txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="idempresa"){
	    $sql="SELECT * FROM vista_empresa WHERE idempresa LIKE '$txtabuscar%' order by idempresa";
		$sqlcon="SELECT COUNT(idempresa) AS numero FROM vista_empresa WHERE idempresa LIKE '$txtabuscar%' order by idempresa";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté folio no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="nombre"){
	    $sql="SELECT * FROM vista_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
		$sqlcon="SELECT COUNT(nombre) AS numero FROM vista_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
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
	if($tipoopcion=="rfc"){
	    $sql="SELECT * FROM vista_empresa WHERE rfc LIKE '$txtabuscar%' order by rfc";
		$sqlcon="SELECT COUNT(rfc) AS numero FROM vista_empresa WHERE rfc LIKE '$txtabuscar%' order by rfc";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté RFC no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="razon_social"){
	    $sql="SELECT * FROM vista_empresa WHERE razon_social LIKE '$txtabuscar%' order by razon_social";
		$sqlcon="SELECT COUNT(razon_social) AS numero FROM vista_empresa WHERE razon_social LIKE '$txtabuscar%' order by razon_social";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta razón social no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="nombre_sector"){
	    $sql="SELECT * FROM vista_empresa WHERE nombre_sector LIKE '$txtabuscar%' order by nombre_sector";
		$sqlcon="SELECT COUNT(nombre_sector) AS numero FROM vista_empresa WHERE nombre_sector LIKE '$txtabuscar%' order by nombre_sector";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté sector no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
	if($tipoopcion=="nombre_giro"){
	    $sql="SELECT * FROM vista_empresa WHERE nombre_giro LIKE '$txtabuscar%' order by nombre_giro";
		$sqlcon="SELECT COUNT(nombre_giro) AS numero FROM vista_empresa WHERE nombre_giro LIKE '$txtabuscar%' order by nombre_giro";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté giro comercial no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
} 

if(isset($_POST['txtabuscar'])){
  $txtabuscar=$_POST['txtabuscar'];
  $tipoopcion=$_POST['tipoopcion'];
    if($tipoopcion=="idempresa"){
	    $sql="SELECT * FROM vista_empresa WHERE idempresa LIKE '$txtabuscar%' order by idempresa";
    }
	if($tipoopcion=="nombre"){
	    $sql="SELECT * FROM vista_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
    }
    if($tipoopcion=="rfc"){
	    $sql="SELECT * FROM vista_empresa WHERE rfc LIKE '$txtabuscar%' order by rfc";
    }
	if($tipoopcion=="razon_social"){
	    $sql="SELECT * FROM vista_empresa WHERE razon_social LIKE '$txtabuscar%' order by razon_social";
    }
	if($tipoopcion=="nombre_sector"){
	    $sql="SELECT * FROM vista_empresa WHERE nombre_sector LIKE '$txtabuscar%' order by nombre_sector";
    }
    if($tipoopcion=="nombre_giro"){
	    $sql="SELECT * FROM vista_empresa WHERE nombre_giro LIKE '$txtabuscar%' order by nombre_giro";
    } 
}
$consulta=mysql_query($sql);
        //Inicio tabla responsiva para la consulta de las empresas
          echo '<table border="0" class="table table-responsive table-hover">';
		     if($_POST['txtabuscar']==NULL){
					$txtabuscar=$_POST['txtabuscar'];
					$tipoopcion=$_POST['tipoopcion'];
					if($tipoopcion=="idempresa"){
						$sql="SELECT * FROM vista_empresa WHERE idempresa LIKE '$txtabuscar%' order by idempresa";
						$sqlcon="SELECT COUNT(idempresa) AS numero FROM vista_empresa WHERE idempresa LIKE '$txtabuscar%' order by idempresa";
						$consultacon=mysql_query($sqlcon);		
						while ($rowcon=mysql_fetch_array($consultacon)){
							$numero=$rowcon['numero'];
							if($numero==0){ 
							echo "<center>";
								echo '<div class="alert alert-danger">';
								echo '<strong>¡No hay datos por mostrar!</strong>, Agregue una empresa';
								echo '</div>';
								exit();
							}
						}
					}
					if($tipoopcion=="nombre"){
						$sql="SELECT * FROM vista_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
						$sqlcon="SELECT COUNT(nombre) AS numero FROM vista_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
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
					if($tipoopcion=="rfc"){
						$sql="SELECT * FROM vista_empresa WHERE rfc LIKE '$txtabuscar%' order by rfc";
						$sqlcon="SELECT COUNT(rfc) AS numero FROM vista_empresa WHERE rfc LIKE '$txtabuscar%' order by rfc";
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
					if($tipoopcion=="razon_social"){
						$sql="SELECT * FROM vista_empresa WHERE razon_social LIKE '$txtabuscar%' order by razon_social";
						$sqlcon="SELECT COUNT(razon_social) AS numero FROM vista_empresa WHERE razon_social LIKE '$txtabuscar%' order by razon_social";
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
					if($tipoopcion=="nombre_sector"){
						$sql="SELECT * FROM vista_empresa WHERE nombre_sector LIKE '$txtabuscar%' order by nombre_sector";
						$sqlcon="SELECT COUNT(nombre_sector) AS numero FROM vista_empresa WHERE nombre_sector LIKE '$txtabuscar%' order by nombre_sector";
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
					if($tipoopcion=="nombre_giro"){
						$sql="SELECT * FROM vista_empresa WHERE nombre_giro LIKE '$txtabuscar%' order by nombre_giro";
						$sqlcon="SELECT COUNT(nombre_giro) AS numero FROM vista_empresa WHERE nombre_giro LIKE '$txtabuscar%' order by nombre_giro";
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
					if($tipoopcion=="idempresa"){
						$sql="SELECT * FROM vista_empresa WHERE idempresa LIKE '$txtabuscar%' order by idempresa";
					}
					if($tipoopcion=="nombre"){
						$sql="SELECT * FROM vista_empresa WHERE nombre LIKE '$txtabuscar%' order by nombre";
					}
					if($tipoopcion=="rfc"){
						$sql="SELECT * FROM vista_empresa WHERE rfc LIKE '$txtabuscar%' order by rfc";
					}
					if($tipoopcion=="razon_social"){
						$sql="SELECT * FROM vista_empresa WHERE razon_social LIKE '$txtabuscar%' order by razon_social";
					}
					if($tipoopcion=="nombre_sector"){
						$sql="SELECT * FROM vista_empresa WHERE nombre_sector LIKE '$txtabuscar%' order by nombre_sector";
					}
					if($tipoopcion=="nombre_giro"){
						$sql="SELECT * FROM vista_empresa WHERE nombre_giro LIKE '$txtabuscar%' order by nombre_giro";
					} 
				}
                echo '<th>Folio</th><th>Empresa</th><th>RFC</th><th>Razón Social</th><th>Tipo Sector</th><th>Giro Comercial</th><th>Ver</th><th>Editar</th><th>Eliminar</th>';
                while ($row=mysql_fetch_array($consulta)){
                  $idempresa=$row['idempresa'];
                  echo '<tr>';
                    echo '<td>'.$row['idempresa'].'</td>';
					echo '<td>'.utf8_encode($row['nombre']).'</td>'.'<td>'.$row['rfc'].'</td>'.'<td>'.utf8_encode($row['razon_social']).'</td>';
                    echo '<td>'.$row['nombre_sector'];
					   include("../include/conexion.php");
					   //Uso de la condicional if para asignar el tipo sector 
						        if($row['tipo_sector']=="1"){
							    echo '<b>PRIMARIO</b>';
							     }
				                if($row['tipo_sector']=="2"){
							    echo '<b>SECUNDARIO</b>';
							     }
								if($row['tipo_sector']=="3"){
							    echo '<b>TERCIARIO</b>';
							     }	//Termina consulta					
					echo '</td>';
					echo '<td>'.utf8_encode($row['nombre_giro']).'</td>';
				 //si usuario ya se registro podra ver la información que le corresponde
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$idempresa.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
								//línea de codigo para poner el botón con imagen (actualizar empresa)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_empresa".$idempresa.'" '.'>';
									  echo '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
								//línea de codigo para poner el botón con imagen (eliminar empresa)
								echo '<td>';
								  echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_empresa".$idempresa.'" '.'>';
									  echo '<i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								  echo '</buttton>';    
								echo '</td>';
                                //mas información de la empresa solo usuario registrado podrá ver.
                             //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$idempresa.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<b><center>'."FOLIO DE SOLICITUD:"." ".$row['idempresa'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."EMPRESA:".'</b>'." ".utf8_encode($row['nombre']).'<br>'."<b>RFC: </b>"." ".$row['rfc'];
                                echo '        <b>'."<br>RAZON SOCIAL: </b>"." ".utf8_encode($row['razon_social']).'<br>'."<b>TIPO SECTOR: </b>"." ".utf8_encode($row['nombre_sector']);
                                echo '        <b>'."<br>GIRO COMERCIAL: </b>"." ".$row['nombre_giro'];
                                echo '        <b>'."<br>TAMAÑO: </b>"." ".$row['tamanio'].'<br>'."<b>TELÉFONO: </b>"." ".$row['telefono'];
                                echo '        <b>'."<br>DIRECCIÓN: </b>"." ".$row['direccion']." ".'<br>'."<b>CORREO ELECTRÓNICO: </b>"." ".$row['email']." ";
                                echo '        <b>'."<br>PÁGINA WEB: </b>"." ".$row['pagina_web'];
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
                 echo '</table>';  //Cerrar tabla
//generando ventanas modales para editar y ver más información.    			
$consulta=mysql_query($sql);                 
                while ($row=mysql_fetch_array($consulta)){
                $idempresa=$row['idempresa'];	
                                      ////formulario para editar empresa de manera individual
                                      echo ' <!--Ventana para captura de editar empresa-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_empresa'.$idempresa.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR EMPRESA</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_empresa.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }
$consulta=mysql_query($sql);                 
                while ($row=mysql_fetch_array($consulta)){
                $idempresa=$row['idempresa'];
                                      ////formulario para eliminar empresa de manera individual
                                      echo ' <!--Ventana para captura de eliminar empresa-->';
                                      echo '<div class="modal fade" id='.'"'.'eliminar_empresa'.$idempresa.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ELIMINAR EMPRESA</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_eliminar_empresa.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                } //fin de ventanas modales                

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
                        echo '  </div>';
                        echo '</div>';
                        // error de logueo     
  mysql_close();              
  ?>	