<!--Formulario para eliminar materia-->
<?php
echo ' <form method="post" action="../queries/eliminar_materia.php">';
echo '   <font size=3><b>¿Está seguro de eliminar esta materia?</b></font>,<font color="blue" size="3"> Una vez eliminada no se podrá recuperar.</font>';
echo '    <br>    ';
echo '    <br>    ';

echo '      <label for="eli_materia" class="control-label col-sm-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLAVE MATERIA:</label>';
echo '          <div class="col-sm-6">';
echo '               <input type="hidden" class="form-control input-sm" id="clave" name="clave" maxlength="10" required  value='.'"'.$row["clave"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="clave" name="clave" maxlength="100" required disabled value='.'"'.$row["clave"].'"'.'/>';
echo '          </div>';
echo '    <br>';
echo '    <br>';

echo '<font color="gray"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATOS DE LA MATERIA: </b></font>'.utf8_encode($row["clave"]);
echo ' - ';
echo ' '.utf8_encode($row["nombre"]);
echo ' - ';
echo ' '.utf8_encode($row["creditos"]);
echo ' &nbsp;créditos';
echo '    <br>';
echo '    <br>    ';

			if($row['clave']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}
														
			if($row['clave']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
				
echo ' </form>';
?>