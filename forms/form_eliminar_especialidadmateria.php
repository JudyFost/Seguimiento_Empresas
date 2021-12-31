<!--Formulario para eliminar especialidad materia-->
<?php
echo ' <form method="post" action="../queries/eliminar_especialidadmateria.php">';
echo '   <font size=3><b>¿Está seguro de eliminar la relación (Especialidad-Materia)?</b></font>,<font color="blue" size="3"> Una vez eliminada no se podrá recuperar.</font>';
echo '    <br />    ';
echo '    <br />    ';

echo '      <label for="especialidad" class="control-label col-sm-4">ESPECIALIDAD:</label>';
echo '          <div class="col-sm-6">';
echo '               <input type="hidden" class="form-control input-sm" id="idespecialidad_materia" name="idespecialidad_materia" size="45" maxlength="50" required  value='.'"'.$row_eliminar["idespecialidad_materia"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="idespecialidad" name="idespecialidad" size="45" maxlength="50" required disabled value='.'"'.$row_eliminar["idespecialidad"]." - ".$row_eliminar["clave_materia"].'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';
echo '<br>';

			if($row_eliminar['idespecialidad_materia']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}
														
			if($row_eliminar['idespecialidad_materia']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>