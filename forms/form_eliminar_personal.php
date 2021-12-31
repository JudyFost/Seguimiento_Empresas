<!--Formulario para eliminar usuario responsable-->
<?php
echo ' <form method="post" action="../queries/eliminar_personal.php">';
echo '   <font size=3><b>¿Está seguro de eliminar este usuario?</b></font>,<font color="blue" size="3"> Una vez eliminado no se podrá recuperar.</font>';
echo '    <br>    ';
echo '    <br>    ';

echo '      <label for="tipo_usuario" class="control-label col-sm-4">NOMBRE USUARIO:</label>';
echo '          <div class="col-sm-6">';
echo '               <input type="text" class="form-control input-sm" id="idusuario" name="idusuario" size="45" maxlength="50" required disabled value='.'"'.$row_eliminar["idusuario"].'"'.'/>';
echo '          </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="tipo_usuario" class="control-label col-sm-4">TIPO DE USUARIO:</label>';
echo '                    <div class="col-sm-6">';
                            $idtipo_usuario=$row_eliminar["idtipo_usuario"];
echo '                      <select class="form-control input-sm" id="tipo_usuario" name="tipo_usuario" disabled value='.'"'.$row_eliminar["idtipo_usuario"].'"'.'>';
								 $sql_tipouser=mysql_query("SELECT * FROM tipo_usuario WHERE idtipo_usuario=$idtipo_usuario ");
										while($rowtipouser = mysql_fetch_array($sql_tipouser))
											  {
								  echo'<OPTION VALUE="'.$rowtipouser['idtipo_usuario'].'">'.$rowtipouser['descripcion'].'</OPTION>';
											  }
								$sql_tipouser=mysql_query("SELECT * FROM tipo_usuario ORDER BY descripcion");
										while($rowtipouser = mysql_fetch_array($sql_tipouser))
											  {
									if($rowtipouser['idtipo_usuario']!=$id_tipo_usuario){
										echo'<OPTION VALUE="'.$rowtipouser['idtipo_usuario'].'">'.$rowtipouser['descripcion'].'</OPTION>';
																						}
											  }
echo '                     </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

			if($row_eliminar['idtipo_usuario']=="3"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success" disabled>Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}
														
			if($row_eliminar['idtipo_usuario']!="3"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>