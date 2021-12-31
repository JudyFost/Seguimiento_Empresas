<!--Formulario para eliminar seguimiento del alumno de manera individual-->
<?php
echo ' <form method="post" action="../queries/eliminar_historial.php">';
echo '   <font size=3><b>¿Está seguro de eliminar esté seguimiento académico?</b></font>,<font color="blue" size="3"> Una vez eliminado no se podrá recuperar.</font>';
echo '<br>';
echo '<br>';

echo '      <label for="idcontrol" class="control-label col-sm-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. CONTROL:</label>';
echo '          <div class="col-sm-6">';
echo '               <input type="hidden" class="form-control input-sm" id="idcontrol" name="idcontrol" size="45" maxlength="50" required  value='.'"'.$row["idcontrol"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="idcontrol" name="idcontrol" size="45" maxlength="50" required disabled value='.'"'.utf8_encode($row["idcontrol"]).'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';
echo '<br>';

			if($row['idcontrol']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}												
			if($row['idcontrol']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>