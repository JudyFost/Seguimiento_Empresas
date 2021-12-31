<!--Formulario para eliminar solicitud-->
<?php
echo ' <form method="post" action="../queries/eliminar_solicitud.php">';
echo '   <font size=3><b>¿Esta seguro de eliminar esta solicitud?</b></font>,<font color="blue" size="3"> una vez eliminada no se podra recuperar</font>';
echo '    <br />    ';
echo '    <br />    ';

echo '      <label for="id_solicitud" class="control-label col-sm-4">SOLICITUD:</label>';
echo '          <div class="col-sm-8">';
echo '               <input type="hidden" class="form-control input-sm" id="id_solicitud" name="id_solicitud" size="45" maxlength="50" required  value='.'"'.$row_eliminar["idsolicitud"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="id_solicitud" name="id_solicitud" size="45" maxlength="50" required disabled value='.'"'.$row_eliminar["idsolicitud"].'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';


			if($row_eliminar['idsolicitud']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}
														
			if($row_eliminar['idsolicitud']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>