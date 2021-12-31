<!--Método para invocar la sesion de un responsable empresa  antes de manipularlo y si ya esta el empresa creada entonces manipular la información-->
<?php
session_start();
//Código para incluir el archivo de conexion
include ('../include/conexion.php');
//Uso de la condicional if para realizar la búsqueda de un usuario por idusuario, nombre, apellido_paterno, apellido materno y puesto
	$txtabuscar=$_POST['txtabuscar'];
    $tipoopcion=$_POST['tipoopcion'];
	$idusuario_user=$_SESSION["idusuario"];
    if($tipoopcion=="id_usuario"){
	  $tipo_usuario_idtipo_usuario=$_POST['$tipo_usuario_idtipo_usuario'];
	   $sql="SELECT * FROM usuario where tipo_usuario_idtipo_usuario LIKE '$txtabuscar%' AND idusuario='$idusuario_user' order by idusuario;";
		$sqlcon="SELECT COUNT(idusuario) AS numero FROM usuario WHERE idusuario LIKE '$txtabuscar%' order by idusuario";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esté No. de control no existe, verifique sus datos';
				echo '</div>';
				exit();
			}
		}
    }
$consulta=mysql_query($sql);		
        //Inicio tabla responsiva para la consulta de los usuarios
          echo '<table border="0" class="table table-responsive table-hover">';
		    echo '<th>Usuario</th><th>Nombre(s)</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Puesto (Cargo)</th><th>Ver</th><th>Editar</th>';
                while ($row=mysql_fetch_array($consulta)){
                  $idusuario=$row['idusuario'];
                  echo '<tr>';
                    echo '<td>'.$row['idusuario'];
					echo '<br>';
					    include("../include/conexion.php");
						   //Uso de la condicional if para asignar el tipo usuario 
						        if($row['tipo_usuario_idtipo_usuario']=="1"){
							    echo '<b><font color="red">ADMINISTRADOR DEL SISTEMA</b></font>';
							    }
								if($row['tipo_usuario_idtipo_usuario']=="3"){
								 $resultado = mysql_query("SELECT * FROM seguimiento_empresas.vista_user_depemp where idusuario='$idusuario' order by idusuario;");
									if (!$resultado) {
										echo 'No se pudo ejecutar la consulta: ' . mysql_error();
										exit;
									}
								$fila = mysql_fetch_row($resultado);
									echo '<font color="green"><b>';								
									    echo utf8_encode($fila[4]);
								    echo '</b></font>';
									echo '&nbsp;';
										echo '-';
									echo '&nbsp;';
									echo '<font color="green"><b>';
									    echo utf8_encode($fila[7]);
									echo '</b></font">';								
							    }
								if($row['tipo_usuario_idtipo_usuario']=="4"){
								echo '<b>(PERSONAL DE EMPRESA)';
					            }
								if($row['tipo_usuario_idtipo_usuario']=="5"){
								echo '<b><font color="red">JEFE DE DIVISION</b></font>';
								}
								if($row['tipo_usuario_idtipo_usuario']=="6"){
								echo '<b><font color="red">JEFE DE DEPARTAMENTO</b></font>';
								}//Termina consulta								
					echo '</td>';
					//Uso de la variable $row para que muestre el resultado del campo nombre, apellido paterno, apellido materno y puesto al realizar la consulta usuarios
					echo '<td>'.utf8_encode($row['nombre']).'</td>'.'<td>'.utf8_encode($row['apellido_paterno']).'</td>'.'<td>'.utf8_encode($row['apellido_materno']).'</td>';
                    echo '<td>'.utf8_encode($row['puesto']);
					echo '<br>';
					include("../include/conexion.php");
					//Uso de la condicional if para cargar el tipo de usuario
								if($row['tipo_usuario_idtipo_usuario']=="1"){
								echo '<font color="red"><b>(ADMINISTRADOR)</b></font>';
								}
								if($row['tipo_usuario_idtipo_usuario']=="3"){
								echo '<b><font color="green">(RESPONSABLE EMPRESA)</font></b>';
								}
								if($row['tipo_usuario_idtipo_usuario']=="4"){
								echo '<b><font color="green">(PERSONAL EMPRESA)</font></b>';
								}
								if($row['tipo_usuario_idtipo_usuario']=="5"){
								echo '<b><font color="red">(JEFE DE DIVISION)</b></font>';
								} 
								if($row['tipo_usuario_idtipo_usuario']=="6"){
								echo '<b><font color="red">(JEFE DE DEPARTAMENTO)</b></font>';
								} //Termina consulta	
					echo '</td>';
					
				//si usuario ya se registro podra ver la informacion
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
									echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$idusuario.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
                                //línea de codigo para poner el botón con imagen (actualizar usuario)
								echo '<td>';
								    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_usuario".$idusuario.'" '.'>';
										echo '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i>';
								    echo '</buttton>';    
								echo '</td>';

                                //mas informacion del usuario responsable que solo el usuario registrado podra ver.
                                //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$idusuario.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<font color="gray"><b><center>'."USUARIO:"." ".$row['idusuario'].'</b></font>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '      <p><b>'."USUARIO:".'</b>'." ".utf8_encode($row['idusuario']).'<br>'."<b>RESPONSABLE: </b>"." ".utf8_encode($row['nombre'])." ".utf8_encode($row['apellido_paterno'])." ".utf8_encode($row['apellido_materno']);
                                echo '        <b>'."<br>PUESTO (CARGO): </b>"." ".utf8_encode($row['puesto']);
								echo '        <b>'."<br>SEXO: ".'</b>';
												  $sexo=$row['sexo'];
												  if($sexo=='H'){
												  echo 'HOMBRE';
												  }
												  if($sexo=='M'){
												  echo 'MUJER';
												  }                                                       
                                echo '        <b>'."<br>CORREO: </b>"." ".utf8_encode($row['correo']);
								echo '        <b>'."<br>TELÉFONO: </b>"." ".$row['telefono'];
								echo '        <b>'."<br>DIRECCIÓN: </b>"." ".utf8_encode($row['direccion']);
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
//generando ventanas modales para editar y ver más información.                         
$consulta=mysql_query($sql);                 
                while ($row=mysql_fetch_array($consulta)){
                $idusuario=$row['idusuario'];	
                                      ////formulario para editar usuario de manera individual
                                      echo ' <!--Ventana para captura de editar usuario-->';
                                      echo '<div class="modal fade" id='.'"'.'actualizar_usuario'.$idusuario.'" '.' role="dialog">';
                                      echo '<div class="modal-dialog">';
                                      echo ' <!-- Modal content-->';
                                      echo '    <div class="modal-content">';
                                      echo '        <div class="modal-header">';
                                      echo '          <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                      echo '          <h5 class="modal-title" style="color:black;"><b><center>ACTUALIZAR USUARIO</center></b></h5>';
                                      echo '        </div>';
                                      echo '        <div class="modal-body">';
                                      include ('../forms/form_actualizar_personal.php');  ///incluyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';
                }

                        //error de logueo
                        echo '<div class="modal fade" id="error_logueo" role="dialog">';
                        echo '  <div class="modal-dialog">';
                          
                        // <!-- Modal content-->
                        echo '<div class="modal-content">';
                        echo '     <div class="modal-header">';
                        echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                        echo '        <h3 class="modal-title" style="color:red;"><b><center>! Inicia Sesion !</center></b></h3>';
                        echo '      </div>';
                        echo '      <div class="modal-body">';
                        echo '        <h4><b>Para más información: </b><a href="../index.php">Inicia Sesion</a></h4>';
                        echo '      </div>';
                        echo '    </div>';
                        
                        echo '   </div>';
                        echo '</div>';
                        // error de logueo     
  mysql_close();              
  ?>	