<!--Formulario para eliminar especialidad-->
<?php
echo ' <form method="post" action="../queries/eliminar_especialidad.php">';
echo '   <font size=3><b>¿Está seguro de eliminar esta especialidad?</b></font>,<font color="blue" size="3"> Una vez eliminada no se podrá recuperar.</font>';
echo '<br>';
echo '<br>';

echo '      <label for="eli_especialidad" class="control-label col-sm-4">CLAVE ESPECIALIDAD:</label>';
echo '          <div class="col-sm-8">';
echo '               <input type="hidden" class="form-control input-sm" id="idespecialidad" name="idespecialidad" size="45" maxlength="50" required  value='.'"'.$row["idespecialidad"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="descripcion" name="descripcion" size="45" maxlength="50" required disabled value='.'"'.utf8_encode($row["idespecialidad"])." - ".utf8_encode($row["nombre"])." - ".utf8_encode($row["descripcion"]).'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';
echo '<br>';

			if($row['idespecialidad']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}												
			if($row['idespecialidad']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>