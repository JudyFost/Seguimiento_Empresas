<?php
session_start();
include ('.../include/conexion.php');
$txtabuscar=$_POST['txtabuscar'];
$tipoopcion=$_POST['tipoopcion'];
  if($tipoopcion=="numero"){
      $sql=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE idsolicitud LIKE '$txtabuscar%' order by idsolicitud");
  }
  if($tipoopcion=="prestamo"){
      $sql=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE descripcion_idtipo_solicitud LIKE '$txtabuscar%' order by idsolicitud");
  }
  if($tipoopcion=="division"){
      $sql=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE nombre_division LIKE '$txtabuscar%' order by idsolicitud");
  } 
  if($tipoopcion=="empresa"){
      $sql=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE razon_social LIKE '$txtabuscar%' order by idsolicitud");
  }
  if($tipoopcion=="status"){
      $sql=mysql_query("SELECT * FROM solicitudes_varios_estatus WHERE status LIKE '$txtabuscar%' order by idsolicitud");
  }
  //por empresa
          echo '<div id="div_resultado">';
            echo '<table border="0" class="table table-hover">';
            echo '<th>Folio </th><th>Empresa Solicitante</th><th>Tipo de solicitud</th><th>División</th><th>Especialidad</th><th>Genero</th><th>Situación</th><th>Ver</th>';
            while ($row=mysql_fetch_array($sql)){
              $idsolicitud=$row['idsolicitud'];
              if($row['idstatus']==1){
                echo '<tr style="background:#A9F5A9;">';
                }
              if($row['idstatus']==2){
                echo '<tr style="background:#F78181;">';
                }
              if($row['idstatus']==3){
                echo '<tr style="background:#BDBDBD;">';
                }    
              if($row['idstatus']==4){
                echo '<tr style="background:#F3F781;">';
                }         
                echo '<td>'.$row['idsolicitud'].'</td>'. " ".'<td>'.$row['razon_social'].'</td>'." ".'<td>'.$row['descripcion_idtipo_solicitud'].'</td>'."".'<td>'.$row['nombre_division'].'</td>'."".'<td>'.$row['nombre_especialidad'].'</td>';
                                 echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."actualizar_empresa".$idempresa.'" '.'>';
                          echo '<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#2E9AFE;"></i>';
                      echo '</buttton>'; 
                if($row['genero']=="H"){
                    echo '<td>'.'HOMBRE'.'</td>';
                  }
                  if($row['genero']=="M"){
                    echo '<td>'.'MUJER'.'</td>';
                  }
                  if($row['genero']=="A"){
                    echo '<td>'.'AMBOS'.'</td>'; 
                  }
                echo '<td>'.$row['status'].'</td>';   
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
                                echo '        <h4 class="modal-title">'.'<b><center>'."FOLIO DE SOLICITUD:"." ".$row['idsolicitud'].'</b>'.'</center>'.'</h4>';
                                echo '      </div>';
                                echo '      <div class="modal-body">';
                                echo '       <p><b>'."NOMBRE DE LA EMPRESA: </b>"." ".$row['razon_social'].'<br>'."<b>SOLICITA RESIDENTES: </b>"." ".$row['descripcion_idtipo_solicitud'];
                                echo '        <b>'."<br>GENERO SOLITADO: </b>"." ".$row['genero'].'<br>'."<b>DIVISION: </b>"." ".$row['nombre_division'];
                                echo '        <b>'."<br>FECHA INICIO: </b>"." ".$row['fecha_inicio'].'<br>'."<b>FECHA MAXIMA: </b>"." ".$row['fecha_max'];
                                echo '        <b>'."<br>ESPECIALIDAD: </b>"." ".$row['nombre_especialidad'].'<br>'."<b>HORA ENTRADA: </b>"." ".$row['horario_inicio']." "."hrs";
                                echo '        <b>'."<br>HORA DE SALIDA: </b>"." ".$row['horario_fin']."   "."hrs".'<br>'."<b>SEMESTRE: </b>"." ".$row['semestre'];
                                echo '        <b>'."<br>NIVEL DE INGLES: </b>"." ".$row['nivel_ingles'];
                                echo '       </p>';
                                echo '       <h4><b><center>'.'RESPONSABLE'.'</h4></b></center>';
                                echo '       <p><b>'."RESPONSABLE: </b>"." ".$row['nombre_responsable'].'<br>'."<b>DEPARTAMENTO: </b>"." ".$row['departamento_responsable'];
                                echo '        <b>'."<br>CARGO: </b>"." ".$row['cargo_responsable'].'<br>'."<b>TELEFONO: </b>"." ".$row['telefono_responsable'];
                                echo '        <b>'."<br>CORREO: </b>"." ".$row['email_responsable'].'<br>';
                                echo '       </p>';
                                echo '       <h4><b><center>'.'OBSERVACIONES'.'</h4></b></center>';
                                echo '       <p>'.$row['observaciones'].'<br>';
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
                                    echo '<i class="fa fa-lock" aria-hidden="true"></i>';
                                    echo '</button>';
                     echo '</td>';

                     }
              echo '</tr>';
            }
//cargar ventanas modales para editar
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
                                      include ('../form_actualizar_empresa.php');  ///inlcuyo el formulario
                                      echo '        </div>';
                                      echo '      </div>';
                                      echo '    </div>';
                                      echo '  </div>';


            
//fin de ventanas modales            
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
  mysql_close(); 
?>
