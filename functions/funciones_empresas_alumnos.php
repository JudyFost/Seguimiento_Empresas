<?php
//Código para incluir el archivo de conexion
include ('.../include/conexion.php');
session_start();
if(isset($_POST['txtabuscar'])){
  $txtabuscar=$_POST['txtabuscar']; 
  $sql="SELECT * FROM empresa  WHERE nombre LIKE '$txtabuscar%' order by nombre";
}
else{
  $sql="SELECT * FROM empresa order by nombre";
}
$consulta=mysql_query($sql);
$sql=mysql_query("SELECT * FROM empresa order by nombre");
echo '<table border="0" class="table table-hover">';
      			echo '<th>Nombre</th><th>Razon Social</th><th>Giro Comercial</th><th>Direccion</th>';
	      		while ($row=mysql_fetch_array($consulta)){
              $idempresa=$row['idempresa'];
 					    echo '<tr>';
	      				echo '<td>'.$row['nombre'].'</td>'. " ".'<td>'.$row['razon_social'].'</td>'." ".'<td>'.$row['giro_comercial'].'</td>'." ".'<td>'.$row['direccion'].'</td>';
                      //si usuario ya se registro podra ver la informacion
                /*
                    if(isset($_SESSION['logueo'])){
                          if($_SESSION['logueo']=='t'){
                                echo '<td>';
                                    echo '<button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#".$idempresa.'" '.'>';
                                    echo '<i class="fa fa-search" aria-hidden="true"></i>';
                                    echo '</button>';
                                echo '</td>';
                                //mas informacion de la empresa solo usuario registrado podra ver.(Ventana emergente)
                            //    <!-- Modal -->
                                  echo '<div class="modal fade" id='.'"'.$idempresa.'" '.'role="dialog">';
                                  echo '  <div class="modal-dialog">';
                                    
                                     // <!-- Modal content-->
                                  echo '    <div class="modal-content">';
                                  echo '      <div class="modal-header">';
                                  echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                                  echo '        <h4 class="modal-title">'.'<b>'.'<center>'.$row['razon_social'].'</b>'.'</center>'.'</h4>';
                                  echo '      </div>';
                                  echo '      <div class="modal-body">';
                                  echo '        <p><b>'."NOMBRE: </b>"." ".$row['razon_social'].'<br>'."<b>GIRO COMERCIAL: </b>"." ".$row['giro_comercial'];
                                  echo '        <b>'."<br>DIRECCION: </b>"." ".$row['direccion'].'<br>';
                                                                echo ' </p>';
                                  echo '<p><center>'.'Para mas informacion contcta al departamento de servicio social y residencia profesional.'.'</p></center>';
                                  echo '      </div>';
                                  echo '      <div class="modal-footer">';
                                  echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                                  echo '      </div>';
                                  echo '    </div>';
                                  
                                 echo '   </div>';
                                 echo '</div>';
                                  // fin de mas informacion
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
                     */
	      			echo '</tr>';
	      		}
            /*
                    //error de logueo
                    echo '<div class="modal fade" id="error_logueo" role="dialog">';
                    echo '  <div class="modal-dialog">';
                      
                       // <!-- Modal content-->
                    echo '    <div class="modal-content">';
                    echo '      <div class="modal-header">';
                    echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
                    echo '        <h4 class="modal-title" style="color:red;"><b><center>! Inicia Sesion !</center></b></h4>';
                    echo '      </div>';
                    echo '      <div class="modal-body">';
                    echo '        <p><b>Para mas informacion: </b><a href="form_login.php">Inicia Sesion</a></p>';
                    echo '        </p>';
                    echo '      </div>';
                    echo '      <div class="modal-footer">';
                    echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
                    echo '      </div>';
                    echo '    </div>';
                    
                   echo '   </div>';
                   echo '</div>';
                    // error de logueo     */
            echo '</table>';
  mysql_close();             
?>            