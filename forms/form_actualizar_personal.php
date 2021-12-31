<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Formulario para actualizar usuario responsable-->
<?php
echo '                <form method="post" action="../queries/actualizar_personal.php">';

echo '                  <label for="idusuario" class="control-label col-sm-4">USUARIO:</label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="hidden" class="form-control input-sm" id="id_usuario" name="id_usuario" size="45" maxlength="50" required  value='.'"'.$row_actualizar["idusuario"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="id_usuario" name="id_usuario" size="45" maxlength="50" required disabled value='.'"'.$row_actualizar["idusuario"].'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="nombre" class="control-label col-sm-4">NOMBRE: <font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["nombre"]).'"'.'/>';
echo '                    </div>  ';
echo '<br>';
echo '<br>';

echo '                  <label for="apellido_paterno" class="control-label col-sm-4">APELLIDO PATERNO:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="apellido_paterno" name="apellido_paterno" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["ap"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="apellido_materno" class="control-label col-sm-4">APELLIDO MATERNO:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="apellido_materno" name="apellido_materno" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["am"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="puesto" class="control-label col-sm-4">CARGO:</label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="text" class="form-control input-sm" id="puesto" name="puesto" size="45" maxlength="70"  style="text-transform: uppercase" onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["cargo"]).'"'.'/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';

echo '                    <label for="sexo" class="control-label col-sm-4">SEXO:<FONT COLOR="red"> * </FONT></label>';
echo '                      <div class="col-sm-6">';
echo '                        <select class="form-control input-sm" id="sexo" name="sexo" value='.'"'.$row_actualizar["sexo"].'"'.'>';
                                    $sexo=$row_actualizar['sexo'];
                                    $sqlsexo=mysql_query("SELECT * FROM usuario where sexo='$sexo' GROUP BY sexo");
                                    while($rowsexo = mysql_fetch_array($sqlsexo))
                                    {
                                    $sexobd=$rowsexo['sexo'];
                                              if($sexo=='H'){
                                              echo '                          <option value="H">HOMBRE</option>';
                                              }
                                              if($sexo=='M'){
                                              echo '                          <option value="M">MUJER</option>';
                                              }                          
                                    }  
                                    $sqlsexo=mysql_query("SELECT * FROM usuario where sexo='$sexo' GROUP BY sexo");
                                     while($rowsexo = mysql_fetch_array($sqlsexo))
                                    {
                                    $sexobd=$rowsexo['sexo'];
                                              if($sexo!='H'){
                                              echo '                          <option value="H">HOMBRE</option>';
                                              }
                                              if($sexo!='M'){
                                              echo '                          <option value="M">MUJER</option>';
                                              }                        
                                    }                     
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="correo" class="control-label col-sm-4">CORREO:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="email" class="form-control input-sm" id="correo" name="correo" size="45" maxlength="50" required value='.'"'.utf8_encode($row_actualizar["email"]).'"'.'/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';

echo '                  <label for="telefono" class="control-label col-sm-4">TELEFONO: <font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="text" class="form-control input-sm" id="telefono" name="telefono" size="45" maxlength="13" required onKeyPress="return soloNumeros(event)" value='.'"'.$row_actualizar["telefono"].'"'.'/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';

echo '                  <label for="direccion" class="control-label col-sm-4">DIRECCION: <font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="text" class="form-control input-sm" id="direccion" name="direccion" size="45" maxlength="50" required onKeyPress="return soloLetras(event)" value='.'"'.$row_actualizar["direccion"].'"'.'/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';

echo '                  <label for="password" class="control-label col-sm-4">NUEVA CONTRASEÑA:</label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="password" class="form-control input-sm" id="password" name="password" size="45" maxlength="50"/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';

echo '                  <label for="tipo_usuario" class="control-label col-sm-4">TIPO DE USUARIO:</label>';
echo '                    <div class="col-sm-6">';
                            $id_tipo_usuario=$row_actualizar["idtipo_usuario"];
echo '                      <select class="form-control input-sm" id="tipo_usuario" name="tipo_usuario" disabled value='.'"'.$row_actualizar["idtipo_usuario"].'"'.'>';
								 $sql_tipouser=mysql_query("SELECT * FROM tipo_usuario WHERE idtipo_usuario=$id_tipo_usuario ");
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

echo '<center><font color="red"> * Campos obligatorios </font><center>';
echo '<br>';

echo '                  <center>';
echo '                     <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>