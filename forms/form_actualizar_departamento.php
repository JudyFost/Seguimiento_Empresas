<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>

<!--Formulario para actualizar departamento-->
<?php
echo '                <form method="post" action="../queries/actualizar_departamento.php">';

echo '                    <label for="idempresa" class="control-label col-sm-4">EMPRESA:<font color="red"> * </font></label>';
echo '                      <div class="col-sm-6">';
echo '                        <select class="form-control input-sm" id="idempresa" name="idempresa" value='.'"'.$row["idempresa"].'"'.'>';
                           		$idempresa=$row_actualizar["idempresa"];
                                    $sql=mysql_query("SELECT * FROM empresa where idempresa='$idempresa'");
                                    while($row = mysql_fetch_array($sql))
			                            {			                           
										echo'<OPTION VALUE="'.$row['idempresa'].'">'.utf8_encode($row['nombre']).'</OPTION>';
			                            }
			                         $sql=mysql_query("SELECT * FROM empresa where idempresa!='$idempresa'");
                                   while($row = mysql_fetch_array($sql))
			                            {
			                            echo'<OPTION VALUE="'.$row['idempresa'].'">'.utf8_encode($row['nombre']).'</OPTION>';
			                            }                                  
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                    <label for="idusuario" class="control-label col-sm-4">RESPONSABLE:<font color="red"> * </font></label>';
echo '                      <div class="col-sm-6">';
echo '                        <select class="form-control input-sm" id="idusuario" name="idusuario" value='.'"'.$row["idusuario"].'"'.'>';
                           		$idusuario=$row_actualizar["idusuario"];
                                    $sql=mysql_query("SELECT * FROM usuario where idusuario='$idusuario'");
                                    while($row = mysql_fetch_array($sql))
			                            {
			                            echo'<OPTION VALUE="'.$row['idusuario'].'">'.utf8_encode($row['nombre'])." ".utf8_encode($row['apellido_paterno'])." ".utf8_encode($row['apellido_materno']).'</OPTION>';
			                            }
			                         $sql=mysql_query("SELECT * FROM usuario where tipo_usuario_idtipo_usuario=3 and idusuario!='$idusuario'");
                                   while($row = mysql_fetch_array($sql))
			                            {
			                            echo'<OPTION VALUE="'.$row['idusuario'].'">'.utf8_encode($row['nombre'])." ".utf8_encode($row['apellido_paterno'])." ".utf8_encode($row['apellido_materno']).'</OPTION>';
			                            }                                  
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="iddepartamento" class="control-label col-sm-4">DEPARTAMENTO:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="hidden" class="form-control input-sm" id="iddepartamento" name="iddepartamento" size="45" maxlength="50" required  value='.'"'.$row_actualizar["iddepartamento"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="nombre_departamento" name="nombre_departamento" size="45" maxlength="50" style="text-transform: uppercase" required  onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["nombre_departamento"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '<br>';
echo '<center><font color="red"> * Campos obligatorios</font></center>';
echo '<br>';

echo '                  <center>';
echo '                     <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>