<!--Formulario para eliminar departamento-->
<?php
echo ' <form method="post" action="../queries/eliminar_departamento_per.php">';
echo '   <font size=3><b>¿Está seguro de eliminar este departamento?</b></font>,<font color="blue" size="3"> Una vez eliminado no se podrá recuperar.</font>';
echo '    <br />    ';
echo '    <br />    ';

echo '      <label for="eli_departamento" class="control-label col-sm-3">DEPARTAMENTO:</label>';
echo '          <div class="col-sm-7">';
echo '               <input type="hidden" class="form-control input-sm" id="id_departamento" name="id_departamento" size="45" maxlength="50" required  value='.'"'.$row_eliminar["iddepartamento"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="nombre_departamento" name="nombre_departamento" size="45" maxlength="50" required disabled value='.'"'.utf8_encode($row_eliminar["nombre_departamento"]).'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';


echo '<center> ';
echo '<font color="orange"><b>EMPRESA: </b></font>'.utf8_encode($row_eliminar["nombre_empresa"]);
echo ' - ';
echo ' '.utf8_encode($row_eliminar["nombre"]).' '.utf8_encode($row_eliminar["ap"]).' '.utf8_encode($row_eliminar["am"]);
echo '</center>';

			if($row_eliminar['iddepartamento']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}
														
			if($row_eliminar['iddepartamento']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>