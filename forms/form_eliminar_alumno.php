<!--Formulario para eliminar usuario (alumno)-->
<?php
echo ' <form method="post" action="../queries/eliminar_alumno.php">';
echo '   <font size=3><b>¿Está seguro de eliminar este número de control?</b></font>,<font color="blue" size="3"> Una vez eliminado no se podrá recuperar.</font>';
echo '<br>';
echo '<br>';

echo '   <font color="black"><label for="tipo_usuario" class="control-label col-sm-4">NÚMERO CONTROL:</label></font>';
echo '          <div class="col-sm-6">';
echo '               <input type="hidden" class="form-control input-sm" id="id_usuario" name="id_usuario" size="45" maxlength="50" required  value='.'"'.$row["idusuario"].'"'.'/>';
echo '               <input type="text" class="form-control input-sm" id="id_usuario" name="id_usuario" size="45" maxlength="50" required disabled value='.'"'.$row["idusuario"].'"'.'/>';
echo '          </div>';

echo '      <label for="tipo_usuario" class="control-label col-sm-4" style="visibility:hidden;">TIPO DE USUARIO:</label>';
echo '          <div class="col-sm-8">';
                    $id_tipo_usuario=$row["tipo_usuario_idtipo"];
echo '              <select class="form-control input-sm" id="tipo_usuario" name="tipo_usuario" disabled style="visibility:hidden;" value='.'"'.$row["tipo_usuario_idtipo"].'"'.'>';
                             $sql_tipouser=mysql_query("SELECT * FROM tipo_usuario WHERE idtipo=$id_tipo_usuario ");
                                    while($rowtipouser = mysql_fetch_array($sql_tipouser))
                            {
                            echo'<OPTION VALUE="'.$rowtipouser['idtipo'].'">'.$rowtipouser['descripcion'].'</OPTION>';

                            }
                            $sql_tipouser=mysql_query("SELECT * FROM tipo_usuario ORDER BY descripcion");
                            while($rowtipouser = mysql_fetch_array($sql_tipouser))
                            {
                                if($rowtipouser['idtipo']!=$id_tipo_usuario){
                                    echo'<OPTION VALUE="'.$rowtipouser['idtipo'].'">'.$rowtipouser['descripcion'].'</OPTION>';
                                }
                            }
echo '              </select>';
echo '          </div>';
echo '<br>';
echo '<br>';

			if($row['tipo_usuario_idtipo']=="1"){
				echo '<center>';
					echo '<button type="submit" class="btn btn-success" disabled>Eliminar</button>';
					echo '&nbsp;&nbsp;';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';               
				echo '</center>';
														}
														
			if($row['tipo_usuario_idtipo']!="1"){
			    echo '<center>';
			        echo '<button type="submit" class="btn btn-success">Eliminar</button>';
					echo '&nbsp;&nbsp;';
			        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
			    echo '</center>';						}
				
echo ' </form>';
?>

