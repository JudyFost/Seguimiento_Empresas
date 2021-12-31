<?php
echo '                <form method="post" action="../queries/actualizar_situacion_e.php">';

echo '                  <label for="idsolicitud" class="control-label col-sm-4">NO FOLIO:</label>';
echo '                   <div class="col-sm-8">';

echo '                      <input type="hidden" class="form-control input-sm" id="idsolicitud" name="idsolicitud" size="45" maxlength="50" required  value='.'"'.$row_actualizar["idsolicitud"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="idsolicitud" name="idsolicitud" size="45" maxlength="50" required disabled value='.'"'.$row_actualizar["idsolicitud"].'"'.'/>';
echo '                    </div>';
echo ' <br> ';
echo ' <br> ';

echo '                    <label for="status_solicitud" class="control-label col-sm-4">SITUACION:</label>';
echo '                      <div class="col-sm-8">';
echo '                        <select class="form-control input-sm" id="status_solicitud" name="status_solicitud" value='.'"'.$row["status"].'"'.'>';
                           		$status_buscar=$row_actualizar["idstatus"];
                                    $sqlstatus=mysql_query("SELECT DISTINCT idstatus_solicitud,descripcion FROM status_solicitud WHERE idstatus_solicitud=$status_buscar");
                                    while($rowstatus = mysql_fetch_array($sqlstatus))
			                            {
			                            echo'<OPTION VALUE="'.$rowstatus['idstatus_solicitud'].'">'.$rowstatus['descripcion'].'</OPTION>';
			                            }
			                         $sqlstatus=mysql_query("SELECT DISTINCT idstatus_solicitud,descripcion FROM status_solicitud WHERE idstatus_solicitud<>$status_buscar");
                                   while($rowstatus = mysql_fetch_array($sqlstatus))
			                            {
			                            echo'<OPTION VALUE="'.$rowstatus['idstatus_solicitud'].'">'.$rowstatus['descripcion'].'</OPTION>';
			                            }      
                            
echo '                      </select>';
echo '                    </div>';
echo ' <br> ';
echo ' <br> ';

echo '                  <label for="observaciones" class="control-label col-sm-4">OBSERVACIONES:</label>';
echo '                   <div class="col-sm-8">';
echo '                      <input type="text" class="form-control input-sm" id="observaciones" name="observaciones" size="150" maxlength="150" style="text-transform: uppercase" value='.'"'.$row_actualizar["observaciones"].'"'.'/>';
echo '                    </div>';
echo ' <br> ';
echo ' <br> ';

echo '                    <label for="encargado" class="control-label col-sm-4">RESPONDIO A LA SOLICITUD:</label>';
echo '                      <div class="col-sm-8">';
echo '                        <select class="form-control input-sm" id="encargado" name="encargado" value='.'"'.$row["idusuario"].'"'.'>';
	                            $idusuario_user=$_SESSION["idusuario"];
								   $sqlencargado=mysql_query("SELECT * FROM seguimiento_empresas.usuario where idusuario='$idusuario_user' order by idusuario;");
										while($rowencargado = mysql_fetch_array($sqlencargado))
								{
								echo'<OPTION VALUE="'.$rowencargado['idusuario'].'">'.utf8_encode($rowencargado['nombre']).' '.utf8_encode($rowencargado['apellido_paterno']).' '.utf8_encode($rowencargado['apellido_materno']).'</OPTION>';
								}												
                            
echo '                      </select>';
echo '                    </div>';
echo ' <br> ';
echo ' <br> ';


echo '                  <center>';
echo '                    <button  	type="submit" class="btn btn-success">Guardar</button>';
echo '                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>