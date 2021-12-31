<?php
session_start();
include ('../include/conexion.php');
$txtabuscar=$_POST['txtabuscar'];
$tipoopcion=$_POST['tipoopcion'];
  if($tipoopcion=="folio"){
      $sql_consulta=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE idsolicitud LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud");
      $sqlcon="SELECT COUNT(idsolicitud) AS numero FROM solicitudes_varios_estatus WHERE idsolicitud LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud";
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
    if($tipoopcion=="empresa"){
      $sql_consulta=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE nombre_empresa LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud");
      $sqlcon="SELECT COUNT(nombre_empresa) AS numero FROM solicitudes_varios_estatus WHERE nombre_empresa LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud";
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
  if($tipoopcion=="prestamo"){
      $sql_consulta=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE descripcion_idtipo_solicitud LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud");
      $sqlcon="SELECT COUNT(descripcion_idtipo_solicitud) AS numero FROM solicitudes_varios_estatus WHERE descripcion_idtipo_solicitud LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Este tipo de servicio no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		} 
  }
  if($tipoopcion=="division"){
      $sql_consulta=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE nombre_division LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud");
      $sqlcon="SELECT COUNT(nombre_division) AS numero FROM solicitudes_varios_estatus WHERE nombre_division LIKE '$txtabuscar%' AND idstatus=4 order by idsolicitud";
		$consultacon=mysql_query($sqlcon);		
		while ($rowcon=mysql_fetch_array($consultacon)){
			$numero=$rowcon['numero'];
			if($numero==0){ 
			echo "<center>";
				echo '<div class="alert alert-danger">';
				echo '<strong>¡Error!</strong> Esta carrera no existe, Verifique sus datos';
				echo '</div>';
				exit();
			}
		}
  } 
  //por empresa
          echo '<div id="div_resultado">';
            echo '<table border="0" class="table table-hover">';
            echo '<th>Folio </th><th>Empresa Solicitante</th><th>Tipo de servicio</th><th>División</th><th>Especialidad</th><th>Genero Solicitado</th><th>Ver</th><th></th><th></th><th></th>';
            while ($row_consulta=mysql_fetch_array($sql_consulta)){
              $idsolicitud=$row_consulta['idsolicitud'];    
              if($row_consulta['idstatus']==4){
                echo '<tr style="background:#ffffff;">';
                }         
                echo '<td>'.$row_consulta['idsolicitud'].'</td>'. " ".'<td>'.utf8_encode($row_consulta['nombre_empresa']).'</td>'." ".'<td>'.$row_consulta['descripcion_idtipo_solicitud'].'</td>'."".'<td>'.utf8_encode($row_consulta['nombre_division']).'</td>'."".'<td>'.$row_consulta['idespecialidad'].'</td>';
                  if($row_consulta['genero']=="H"){
                    echo '<td>'.'HOMBRE'.'</td>';
                  }
                  if($row_consulta['genero']=="M"){
                    echo '<td>'.'MUJER'.'</td>';
                  }
                  if($row_consulta['genero']=="A"){
                    echo '<td>'.'AMBOS'.'</td>'; 
                  }
                
                  //si usuario ya se registro podra ver la informacion
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$idsolicitud.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';

                                //mas informacion de la empresa solo usuario registrado podra ver.
                             //    <!-- Modal -->
                                echo '<div class="modal fade" id='.'"'.$idsolicitud.'" '.'role="dialog">';
                                echo '  <div class="modal-dialog">';
                                  
                                   // <!-- Modal content-->
                                echo '    <div class="modal-content">';
                                echo '      <div class="modal-header">';
                                echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                echo '        <h4 class="modal-title">'.'<b><center>'."FOLIO DE SOLICITUD:"." ".$row_consulta['idsolicitud'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."NOMBRE DE LA EMPRESA:".'</b>'." ".utf8_encode($row_consulta['nombre_empresa']).'<br>'."<b>SOLICITA RESIDENTES: </b>"." ".$row_consulta['descripcion_idtipo_solicitud'];
                                echo '        <b>'."<br>GENERO SOLICITADO: ".'</b>';
                                 $genero=$row_consulta['genero'];
                                              if($genero=='H'){
                                              echo 'HOMBRE';
                                              }
                                              if($genero=='M'){
                                              echo 'MUJER';
                                              }
                                              if($genero=='A'){
                                              echo 'AMBOS';
                                              }                                                       
                                                 
                                echo '        <b>'."<br>DIVISION: </b>"." ".utf8_encode($row_consulta['nombre_division']).'<br>'."<b>ESPECIALIDAD: </b>"." ".$row_consulta['idespecialidad'];
                                echo '        <b>'."<br>NO. ALUMNOS: </b>"." ".$row_consulta['no_alumnos'];
                                echo '        <b>'."<br>FECHA INICIO: </b>"." ".$row_consulta['fecha_inicio'].'<br>'."<b>FECHA MAXIMA: </b>"." ".$row_consulta['fecha_max'];
                                echo '        <b>'."<br>HORA ENTRADA: </b>"." ".$row_consulta['horario_inicio']." "."hrs".'<br>'."<b>HORA DE SALIDA: </b>"." ".$row_consulta['horario_fin']." "."hrs";
                                echo '        <b>'."<br>SEMESTRE: </b>"." ".$row_consulta['semestre'].'<br>'."<b>NIVEL DE INGLES: </b>"." ".$row_consulta['nivel_ingles'];
                                echo '       </p>';
								echo '<p><center style="color:red;">'.'Para más información sobre la solicitud presenta el número de folio en el Departamento de Servicio Social y Residencia Profesional'.'</p></center>' ;
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
