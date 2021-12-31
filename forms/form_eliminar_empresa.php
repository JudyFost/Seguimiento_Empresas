<!--Formulario para eliminar empresa de manera individual-->
<?php
echo ' <form method="post" action="../queries/eliminar_empresa.php">';
echo '   <font size=3><b>¿Está seguro de eliminar esta empresa?</b></font>,<font color="blue" size="3"> Una vez eliminada no se podrá recuperar.</font>';
echo '<br>';
echo '<br>';

echo '      <label for="id_empresa" class="control-label col-sm-2">EMPRESA:</label>';
echo '          <div class="col-sm-8">';
echo '               <input type="hidden" class="form-control input-sm" id="id_empresa" name="id_empresa" size="45" maxlength="50" required  value='.'"'.$row["idempresa"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="45" maxlength="50" required disabled value='.'"'.utf8_encode($row["nombre"]).'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';
echo '<br>';

			if($row['idempresa']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}												
			if($row['idempresa']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>