<?php
echo '                <form method="post" action="../queries/actualizar_situacion.php">';

echo '                  <label for="idsolicitud" class="control-label col-sm-4">NO FOLIO:</label>';
echo '                   <div class="col-sm-8">';

echo '                      <input type="hidden" class="form-control input-sm" id="idsolicitud" name="idsolicitud" size="45" maxlength="50" required  value='.'"'.$row_actualizar["idsolicitud"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="idsolicitud" name="idsolicitud" size="45" maxlength="50" required disabled value='.'"'.$row_actualizar["idsolicitud"].'"'.'/>';
echo '                    </div>';
echo ' <br> ';
echo ' <br> ';
/*
echo '                  <label for="situacion" class="control-label col-sm-4">Situacion: </label>';
echo '                   <div class="col-sm-8">';
echo '                      <input type="text" class="form-control input-sm" id="situacion" name="situacion" size="45" maxlength="50" style="text-transform: uppercase" required value='.'"'.$row["status"].'"'.'/>';
echo '                    </div>';
*/
echo '                    <label for="status_solicitud" class="control-label col-sm-4">SITUACION:</label>';
echo '                      <div class="col-sm-8">';
echo '                        <select class="form-control input-sm" id="status_solicitud" name="status_solicitud" value='.'"'.$row["status"].'"'.'>';
                           		$status_buscar=$row_actualizar["idstatus"];
                             // include("../include/conexion.php");
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
echo '                      <input type="text" class="form-control input-sm" id="observaciones" name="observaciones" size="150" maxlength="150" style="text-transform: uppercase" required value='.'"'.$row_actualizar["observaciones"].'"'.'/>';
echo '                    </div>';
echo ' <br> ';
echo ' <br> ';

echo '                  <center>';
echo '                    <button  	type="submit" class="btn btn-success">Guardar</button>';
echo '                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>