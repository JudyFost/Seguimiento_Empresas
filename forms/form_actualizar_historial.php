<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Formulario para actualizar historial alumno-->
<?php
echo '<form method="post" action="../queries/actualizar_historial.php">';


echo '<input type="hidden" class="form-control input-sm" id="idcontrol" name="idcontrol" size="45" maxlength="50" required  value='.'"'.$row["idcontrol"].'"'.'/>';


echo '                  <label for="idcontrol" class="control-label col-sm-4">No. CONTROL:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="idcontrol" name="nombre" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" disabled value='.'"'.utf8_encode($row["idcontrol"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';


echo '<label for="semestre" class="control-label col-sm-4">SEMESTRE:<font color="red"> * </font></label>';
echo '  <div class="col-sm-6">';
echo '     <input type="number" class="form-control input-sm" id="semetre" name="semestre" size="15" maxlength="15"  min="4" max="13" value='.'"'.utf8_encode($row["semestre"]).'"'.' required/>';
echo '  </div>';
echo '	<br>';
echo '	<br>';

echo ' <label for="seguro_facultativo" class="control-label col-sm-4">SEGURO:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="seguro_facultativo" name="seguro_facultativo" required>';
                             $seguro_facultativo=$row['seguro_facultativo'];
                                    $sqlseguro_facultativo=mysql_query("SELECT * FROM alumno where seguro_facultativo='$seguro_facultativo' GROUP BY seguro_facultativo");
                                    while($rowseguro_facultativo = mysql_fetch_array($sqlseguro_facultativo))
                                    {
                                    $seguro_facultativobd=$rowseguro_facultativo['seguro_facultativo'];
                                              if($seguro_facultativo=='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($seguro_facultativo=='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }											  
                                    }  
                                    $sqlseguro_facultativo=mysql_query("SELECT * FROM alumno where seguro_facultativo='$seguro_facultativo' GROUP BY seguro_facultativo");
                                     while($rowseguro_facultativo = mysql_fetch_array($sqlseguro_facultativo))
                                    {
                                    $seguro_facultativobd=$rowseguro_facultativo['seguro_facultativo'];
                                              if($seguro_facultativo!='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($seguro_facultativo!='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }                        
                                    }
echo '                      </select>';
echo '                    </div>';
echo '					<br>';
echo '					<br>';

echo '                  <label for="creditos_actuales" class="control-label col-sm-4">CREDITOS ACTUALES:</label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="creditos_actuales" name="creditos_actuales" size="45" maxlength="50" style="text-transform: uppercase" onkeypress="return soloNumeros(event)" value='.'"'.utf8_encode($row["creditos_actuales"]).'"'.'/>';							   
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="situacion_alumno_clave" class="control-label col-sm-4">SITUACIÓN:<FONT COLOR="red"> * </FONT></label>';                                               
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="situacion_alumno_clave" name="situacion_alumno_clave" value='.'"'.$row["situacion_alumno_clave"].'"'.'>';
							  $sqlsituacion=mysql_query("SELECT situacion_alumno_clave FROM historial_alumno WHERE idcontrol=$idcontrol GROUP BY situacion_alumno_clave");
                                    while($rowsituacion = mysql_fetch_array($sqlsituacion))
									{
								$sqlsituacion=mysql_query("SELECT * FROM situacion_alumno GROUP BY nombre order by nombre");  
                                   while($rowsituacion = mysql_fetch_array($sqlsituacion))
                                   	  {
                                   		$situacion_imprimir=$rowsituacion['clave'];
                                  		if($situacion_actual!=$situacion_imprimir){
                                     		echo'<OPTION VALUE="'.$rowsituacion['clave'].'">'.utf8_encode($rowsituacion['nombre']).'</OPTION>';                    
                                      		}
                                      }									
								}
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="tipo_alumno_clave" class="control-label col-sm-4">TIPO:<FONT COLOR="red"> * </FONT></label>';                                               
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="tipo_alumno_clave" name="tipo_alumno_clave" value='.'"'.$row["clave_tipoalu"].'"'.'>';
							 $sqltipo=mysql_query("SELECT tipo_alumno_clave FROM historial_alumno WHERE idcontrol=$idcontrol GROUP BY tipo_alumno_clave");
                                    while($rowtipo = mysql_fetch_array($sqltipo))
									{
								$sqltipo=mysql_query("SELECT * FROM tipo_alumno GROUP BY nombre order by nombre");  
                                   while($rowtipo = mysql_fetch_array($sqltipo))
                                   	  {
                                   		$tipo_imprimir=$rowtipo['clave'];
                                  		if($tipo_actual!=$tipo_imprimir){
                                     		echo'<OPTION VALUE="'.$rowtipo['clave'].'">'.utf8_encode($rowtipo['nombre']).'</OPTION>';                    
                                      		}
                                      }									
								}
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';


echo '                  <label for="carrera_idcarrera" class="control-label col-sm-4">CARRERA:<FONT COLOR="red"> * </FONT></label>';                                               
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="carrera_idcarrera" name="carrera_idcarrera" value='.'"'.$row["clave_carrera"].'"'.'>';
							 $sqlcarrera=mysql_query("SELECT carrera_idcarrera FROM historial_alumno WHERE idcontrol=$idcontrol GROUP BY carrera_idcarrera");
                                    while($rowcarrera = mysql_fetch_array($sqlcarrera))
									{
									$sqldivision=mysql_query("SELECT * FROM carrera GROUP BY nombre order by nombre");  
                                   while($rowdivision = mysql_fetch_array($sqldivision))
                                   	  {
                                   		$division_imprimir=$rowdivision['idcarrera'];
                                  		if($division_actual!=$division_imprimir){
                                     		echo'<OPTION VALUE="'.$rowdivision['idcarrera'].'">'.utf8_encode($rowdivision['nombre']).'</OPTION>';                    
                                      		}
                                      }									}
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';


echo ' <label for="servicio_social" class="control-label col-sm-4">SERVICIO SOCIAL:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="servicio_social" name="servicio_social" required>';
                             $servicio_social=$row['servicio_social'];
                                    $sqlservicio_social=mysql_query("SELECT * FROM alumno where servicio_social='$servicio_social' GROUP BY servicio_social");
                                    while($rowservicio_social = mysql_fetch_array($sqlservicio_social))
                                    {
                                    $servicio_socialbd=$rowservicio_social['servicio_social'];
                                              if($servicio_social=='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($servicio_social=='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }											  
                                    }  
                                    $sqlservicio_social=mysql_query("SELECT * FROM alumno where servicio_social='$servicio_social' GROUP BY servicio_social");
                                     while($rowservicio_social = mysql_fetch_array($sqlservicio_social))
                                    {
                                    $servicio_socialbd=$rowservicio_social['servicio_social'];
                                              if($servicio_social!='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($servicio_social!='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }                        
                                    }
echo '                      </select>';
echo '                    </div>';
echo '					<br>';
echo '					<br>';

echo ' <label for="residencia_profesional" class="control-label col-sm-4">RESIDENCIA:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="residencia_profesional" name="residencia_profesional" required>';
                             $residencia_profesional=$row['residencia_profesional'];
                                    $sqlresidencia_profesional=mysql_query("SELECT * FROM alumno where residencia_profesional='$residencia_profesional' GROUP BY residencia_profesional");
                                    while($rowresidencia_profesional = mysql_fetch_array($sqlresidencia_profesional))
                                    {
                                    $residencia_profesionalbd=$rowresidencia_profesional['residencia_profesional'];
                                              if($residencia_profesional=='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($residencia_profesional=='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }											  
                                    }  
                                    $sqlresidencia_profesional=mysql_query("SELECT * FROM alumno where residencia_profesional='$residencia_profesional' GROUP BY residencia_profesional");
                                     while($rowresidencia_profesional = mysql_fetch_array($sqlresidencia_profesional))
                                    {
                                    $residencia_profesionalbd=$rowresidencia_profesional['residencia_profesional'];
                                              if($residencia_profesional!='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($residencia_profesional!='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }                        
                                    }
echo '                      </select>';
echo '                    </div>';
echo '					<br>';
echo '					<br>';

echo ' <label for="proyecto_dual" class="control-label col-sm-4">SEGURO:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="proyecto_dual" name="proyecto_dual" required>';
                             $proyecto_dual=$row['proyecto_dual'];
                                    $sqlproyecto_dual=mysql_query("SELECT * FROM alumno where proyecto_dual='$proyecto_dual' GROUP BY proyecto_dual");
                                    while($rowproyecto_dual = mysql_fetch_array($sqlproyecto_dual))
                                    {
                                    $proyecto_dualbd=$rowproyecto_dual['proyecto_dual'];
                                              if($proyecto_dual=='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($proyecto_dual=='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }											  
                                    }  
                                    $sqlproyecto_dual=mysql_query("SELECT * FROM alumno where proyecto_dual='$proyecto_dual' GROUP BY proyecto_dual");
                                     while($rowproyecto_dual = mysql_fetch_array($sqlproyecto_dual))
                                    {
                                    $proyecto_dualbd=$rowproyecto_dual['proyecto_dual'];
                                              if($proyecto_dual!='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($proyecto_dual!='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }                        
                                    }
echo '                      </select>';
echo '                    </div>';
echo '					<br>';
echo '					<br>';

echo '<center><font color="red"> * Campos obligatorios </font></center>';
echo '<br>';

echo '                  <center>';
echo '                     <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>

