<!--Formulario para eliminar carrera-->
<?php
echo ' <form method="post" action="../queries/eliminar_division.php">';
echo '   <font size=3><b>¿Está seguro de eliminar esta carrera?</b></font>,<font color="blue" size="3"> Una vez eliminada no se podrá recuperar.</font>';
echo '<br>';
echo '<br>';

echo '      <label for="idcarrera" class="control-label col-sm-4">CLAVE CARRERA:</label>';
echo '          <div class="col-sm-8">';
echo '               <input type="hidden" class="form-control input-sm" id="idcarrera" name="idcarrera" size="45" maxlength="50" required  value='.'"'.$row_eliminar["idcarrera"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="clave_carrera" name="clave_carrera" size="45" maxlength="50" required disabled value='.'"'.$row_eliminar["clave_carrera"]." - ".utf8_encode($row_eliminar["nombre"]).'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';

echo '<br>';

			if($row_eliminar['idcarrera']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}
														
			if($row_eliminar['idcarrera']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>