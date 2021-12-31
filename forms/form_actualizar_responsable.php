<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>

<!--Formulario para actualizar los datos del usuario (responsable)-->
<?php
echo '                <form method="post" action="../queries/actualizar_responsable.php">';

echo '                  <label for="tipo_usuario" class="control-label col-sm-4">USUARIO:</label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="hidden" class="form-control input-sm" id="id_usuario" name="id_usuario" size="45" maxlength="50" required  value='.'"'.$row["idusuario"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="id_usuario" name="id_usuario" size="45" maxlength="50" required disabled value='.'"'.$row["idusuario"].'"'.'/>';
echo '                    </div>';
echo '					    </br>';
echo '					    </br>';

echo '                  <label for="nombre" class="control-label col-sm-4">NOMBRE (S):<FONT COLOR="red"> * </FONT></label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="45" maxlength="50" style="text-transform: uppercase" placeholder="NOMBRE COMPLETO" onkeypress="return soloLetras(event)" required value='.'"'.$row["nombre"].'"'.'/>';
echo '                    </div>  ';
echo '                      <FONT COLOR="red">[ obligatorio ]</FONT> ';
echo '					    </br>';
echo '					    </br>';

echo '                  <label for="apellido_paterno" class="control-label col-sm-4">APELLIDO PATERNO:<FONT COLOR="red"> * </FONT></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="apellido_paterno" name="apellido_paterno" size="45" maxlength="50" style="text-transform: uppercase" placeholder="APELLIDO PATERNO" onkeypress="return soloLetras(event)" required value='.'"'.$row["apellido_paterno"].'"'.'/>';
echo '                    </div>';
echo '                      <FONT COLOR="red">[ obligatorio ]</FONT> ';
echo '					    </br>';
echo '					    </br>';

echo '                  <label for="apellido_materno" class="control-label col-sm-4">APELLIDO MATERNO:<FONT COLOR="red"> * </FONT></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="apellido_materno" name="apellido_materno" size="45" maxlength="50" style="text-transform: uppercase" placeholder="APELLIDO MATERNO" onkeypress="return soloLetras(event)" required value='.'"'.$row["apellido_materno"].'"'.'/>';
echo '                    </div>';
echo '                      <FONT COLOR="red">[ obligatorio ]</FONT> ';
echo '					    </br>';
echo '					    </br>';

echo '                  <label for="puesto" class="control-label col-sm-4">PUESTO:</label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="text" class="form-control input-sm" id="puesto" name="puesto" maxlength="70" style="text-transform: uppercase" placeholder="NINGUNO" onkeypress="return soloLetras(event)" value='.'"'.$row["puesto"].'"'.'/>';
echo '                    </div> ';
echo '					    </br>';
echo '					    </br>';




/*echo '                    <label for="sexo" class="control-label col-sm-4">SEXO:<FONT COLOR="red"> * </FONT></label>';
echo '                      <div class="col-sm-6">';
echo '                        <select class="form-control input-sm" id="sexo" name="sexo" value='.'"'.$row["sexo"].'"'.'>';
                                    $sexo=$row['sexo'];
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
echo '					    </br>';
echo '					    </br>';*/

echo '                  <label for="correo" class="control-label col-sm-4">CORREO:<FONT COLOR="red"> * </FONT></label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="email" class="form-control input-sm" id="correo" name="correo" maxlength="20" placeholder="example@gmail.es" required value='.'"'.$row["correo"].'"'.'/>';
echo '                    </div> ';
echo '                      <FONT COLOR="red">[ obligatorio ]</FONT> ';
echo '					    </br>';
echo '					    </br>';

echo '                  <label for="telefono" class="control-label col-sm-4">TELEFONO:<FONT COLOR="red"> * </FONT></label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="text" class="form-control input-sm" id="telefono" name="telefono" maxlength="16" placeholder="7121210000" required value='.'"'.$row["telefono"].'"'.'/>';
echo '                    </div> ';
echo '                      <FONT COLOR="red">[ obligatorio ]</FONT> ';
echo '					    </br>';
echo '					    </br>';

/*echo '                  <label for="password" class="control-label col-sm-4">NUEVO PASSWORD:</label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="password" class="form-control input-sm" id="password" name="password" size="45" maxlength="50" placeholder="NUEVO PASSWORD" />';
echo '                    </div> ';
echo '					    </br>';
echo '					    </br>';*/

echo '                  <label for="tipo_usuario" class="control-label col-sm-4" style="visibility:hidden;">TIPO DE USUARIO:</label>';
echo '                    <div class="col-sm-8">';
                            $id_tipo_usuario=$row["tipo_usuario_idtipo_usuario"];
echo '                      <select class="form-control input-sm" id="tipo_usuario" name="tipo_usuario" disabled style="visibility:hidden;" value='.'"'.$row["tipo_usuario_idtipo_usuario"].'"'.'>';
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
echo '					    </br>';
echo '					    </br>';


echo '                  <center>';
echo '                     <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>