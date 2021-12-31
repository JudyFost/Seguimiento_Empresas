<?php
session_start();
include ('include/conexion.php');
$txtabuscar=$_POST['txtabuscar'];
$tipoopcion=$_POST['tipoopcion'];
  if($tipoopcion=="prestamo"){
      $sql=mysql_query("SELECT * FROM solictudes_pendientes WHERE tipo_descripcion LIKE '$txtabuscar%' order by idsolicitud");
  }
  if($tipoopcion=="division"){
      $sql=mysql_query("SELECT * FROM solictudes_pendientes WHERE division LIKE '$txtabuscar%' order by idsolicitud");
  } 
  if($tipoopcion=="empresa"){
      $sql=mysql_query("SELECT * FROM solictudes_pendientes WHERE nombre_empresa LIKE '$txtabuscar%' order by idsolicitud");
  }
  //por empresa
          echo '<div id="div_resultado">';
            echo '<table border="0" class="table table-hover">';
            echo '<th>No. </th><th>Empresa Solicitante</th><th>Genero</th><th>Prestamo de Servicio</th><th>Division</th><th>Especialidad</th><th>Ver</th>';
            while ($row=mysql_fetch_array($sql)){
              $idsolicitud=$row['idsolicitud'];
              echo '<tr>';
                  echo '<td>'.$row['idsolicitud'].'</td>'. " ".'<td>'.$row['nombre_empresa'].'</td>'." ".'<td>'.$row['genero'].'</td>'."".'<td>'.$row['tipo_descripcion'].'</td>'."".'<td>'.$row['division'].'</td>'."".'<td>'.$row['especialidad_materia'].'</td>';   
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
                                echo '        <h4 class="modal-title">'.'<b><center>'."NUMERO DE SOLICITUD:"." ".$row['idsolicitud'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."NOMBRE DE LA EMPRESA: </b>"." ".$row['nombre_empresa'].'<br>'."<b>SOLICITA RESIDENTES: </b>"." ".$row['tipo_descripcion'];
                                echo '        <b>'."<br>GENERO SOLITADO: </b>"." ".$row['genero'].'<br>'."<b>DIVISION: </b>"." ".$row['division'];
                                echo '        <b>'."<br>ESPECIALIDAD: </b>"." ".$row['especialidad_materia'].'<br>'."<b>HORA ENTRADA: </b>"." ".$row['hora_inicio']." "."hrs";
                                echo '        <b>'."<br>HORA DE SALIDA: </b>"." ".$row['hora_fin']."   "."hrs".'<br>'."<b>SEMESTRE: </b>"." ".$row['semestre'];
                                echo '        <b>'."<br>NIVEL DE INGLES: </b>"." ".$row['nivel_ingles'];
                                echo '       </p>';
                                echo '      </div>';
                                echo '      <div class="modal-footer">';
                                echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                                echo '      </div>';
                                echo '    </div>';
                                
                               echo '   </div>';
                               echo '</div>';
              // fin de mas informacion


                              echo '</tr>';
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
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                     echo '</td>';

                     }
              echo '</tr>';
            }
            //error de logueo
                    echo '<div class="modal fade" id="error_logueo" role="dialog">';
                    echo '  <div class="modal-dialog">';

                    // <!-- Modal content-->
                    echo '    <div class="modal-content">';
                    echo '      <div class="modal-header">';
                    echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                    echo '        <h4 class="modal-title" style="color:red;"><b><center>! Inicia Sesión !</center></b></h4>';
                    echo '      </div>';
                    echo '      <div class="modal-body">';
                    echo '        <p><b>Para más información: </b><a href="form_login.php">Inicia Sesión</a></p>';
                    echo '        </p>';
                    echo '      </div>';
                    echo '      <div class="modal-footer">';
                    echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                    echo '      </div>';
                    echo '    </div>';
                    
                   echo '   </div>';
                   echo '</div>';
                    // error de logueo     
            echo '</table>';
          echo '</div>';
?>
