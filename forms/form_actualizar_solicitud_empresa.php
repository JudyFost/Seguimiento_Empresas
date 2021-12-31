<!--Ventana para modificar los datos de solicitud empresa-->
<?php
echo '                <form method="post" action="../queries/actualizar_solicitud_empresa.php">';
                    
echo '<input type="hidden" class="form-control input-sm" id="idsolicitud" name="idsolicitud" size="45" maxlength="50" required  value='.'"'.$row_actualizar["idsolicitud"].'"'.'/>';
  
echo '<label for="fecha_max" class="control-label col-sm-5">FECHA MAXIMA:</label>';
echo '	<div class="col-sm-7">';
echo '    <input type="date" class="form-control input-sm" id="fecha_max" name="fecha_max"  required value='.'"'.$row_actualizar["fecha_max"].'"'.'/>';
echo '  </div> ';
echo '  <br>';
echo '  <br>';

/*echo '<label for="empresa" class="control-label col-sm-5">EMPRESA: <font color="red"> * </font></label>';
echo '	<div class="col-sm-7">';
echo '		<input type="text" class="form-control input-sm" id="empresa" name="empresa" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["nombre_empresa"]).'"'.'/>';
echo '	</div>  ';
echo '  <br>';
echo '  <br>';

echo '<label for="departartamento" class="control-label col-sm-5">DEPARTAMENTO: <font color="red"> * </font></label>';
echo '	<div class="col-sm-7">';
echo '		<input type="text" class="form-control input-sm" id="empresa" name="empresa" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["departamento_responsable"]).'"'.'/>';
echo '	</div>  ';
echo '  <br>';
echo '  <br>';

echo '<label for="responsable" class="control-label col-sm-5">USUARIO: <font color="red"> * </font></label>';
echo '	<div class="col-sm-7">';
echo '		<input type="text" class="form-control input-sm" id="empresa" name="empresa" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["idusuario"]).'"'.'/>';
echo '	</div>  ';
echo '  <br>';
echo '  <br>';*/
	
echo '<label for="tipo_solicitud" class="control-label col-sm-5">SOLICITA RESIDENTES:</label>';
echo '  <div class="col-sm-7">';
echo '      <select class="form-control input-sm" id="tipo_solicitud" name="tipo_solicitud" value='.'"'.$row["descripcion_idtipo_solicitud"].'"'.'>';
                           		$solicito_buscar=$row_actualizar["idtipo_solicitud"];
                                    $sqlsolicito=mysql_query("SELECT DISTINCT idtipo_solicitud,descripcion FROM tipo_solicitud WHERE idtipo_solicitud=$solicito_buscar");
                                    while($rowsolicito = mysql_fetch_array($sqlsolicito))
			                            {
			                            echo'<OPTION VALUE="'.$rowsolicito['idtipo_solicitud'].'">'.$rowsolicito['descripcion'].'</OPTION>';
			                            }
			                         $sqlsolicito=mysql_query("SELECT DISTINCT idtipo_solicitud,descripcion FROM tipo_solicitud WHERE idtipo_solicitud<>$solicito_buscar");
                                   while($rowsolicito = mysql_fetch_array($sqlsolicito))
			                            {
			                            echo'<OPTION VALUE="'.$rowsolicito['idtipo_solicitud'].'">'.$rowsolicito['descripcion'].'</OPTION>';
			                            }                                  
echo '      </select>';
echo '   </div>';
echo '  <br>';
echo '  <br>';

echo '                  <label for="division" class="control-label col-sm-5">DIVISION:</label>';
echo '                    <div class="col-sm-7">';
echo '                        <select class="form-control input-sm" id='.'"'.'iddivision_actualizar_'.$row_actualizar["idsolicitud"].'"'.' name='.'"'.'iddivision_actualizar_'.$row_actualizar["idsolicitud"].'"'.' onchange="javascript:buscar_actualizar_especialidad('.$row_actualizar["idsolicitud"].')">'; 
							                $idcarrera=$row_actualizar['iddivision'];   
                                    $sqldivision_actualizar=mysql_query("SELECT * FROM carrera where idcarrera=$idcarrera GROUP BY idcarrera ORDER BY nombre");
                                    while($rowdivision_actualizar = mysql_fetch_array($sqldivision_actualizar))
                                        {
                                        echo'<OPTION VALUE="'.$rowdivision_actualizar['idcarrera'].'">'.utf8_encode($rowdivision_actualizar['nombre']).'</OPTION>';                    
                                    $division_actual=$rowdivision_actualizar['idcarrera'];
                                        }
                                   $sqldivision=mysql_query("SELECT * FROM carrera GROUP BY nombre order by nombre");  
                                   while($rowdivision = mysql_fetch_array($sqldivision))
                                   	  {
                                   		$division_imprimir=$rowdivision['idcarrera'];
                                  		if($division_actual!=$division_imprimir){
                                     		echo'<OPTION VALUE="'.$rowdivision['idcarrera'].'">'.utf8_encode($rowdivision['nombre']).'</OPTION>';                    
                                      		}
                                      }                                                                                                 
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="especialidad" class="control-label col-sm-5">ESPECIALIDAD:</label>';
echo '                    <div class="col-sm-7">';
echo '                        <select class="form-control input-sm" id='.'"'.'idespecialidad_actualizar_'.$row_actualizar["idsolicitud"].'"'.' name='.'"'.'idespecialidad_actualizar_'.$row_actualizar["idsolicitud"].'"'.' required>'; 
						            $idespecialidad=$row_actualizar["idespecialidad"];
                                    $sql=mysql_query("SELECT * FROM carrera where especialidad_idespecialidad='$idespecialidad'");
                                    while($row = mysql_fetch_array($sql))
			                            {
										echo'<OPTION VALUE="'.$row['especialidad_idespecialidad'].'">'.$row['especialidad_idespecialidad'].'</OPTION>';
			                            }
			                         /*$sql=mysql_query("SELECT * FROM carrera where especialidad_idespecialidad!='$idespecialidad'");
                                   while($row = mysql_fetch_array($sql))
			                            {
			                            echo'<OPTION VALUE="'.$row['especialidad_idespecialidad'].'">'.$row['especialidad_idespecialidad'].'</OPTION>';
			                            }*/
                                    
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                    <label for="genero" class="control-label col-sm-5">GENERO SOLICITADO:</label>';
echo '                      <div class="col-sm-7">';
echo '                        <select class="form-control input-sm" id="genero" name="genero" value='.'"'.$row["genero"].'"'.'>';
                                    $genero=$row_actualizar['genero'];
                                    $sqlgenero=mysql_query("SELECT * FROM solicitud where genero='$genero' GROUP BY genero");
                                    while($rowgenero = mysql_fetch_array($sqlgenero))
                                    {
                               $generobd=$rowgenero['genero'];
                                              if($genero=='H'){
                                              echo '                          <option value="H">HOMBRE</option>';
                                              }
                                              if($genero=='M'){
                                              echo '                          <option value="M">MUJER</option>';
                                              }
                                              if($genero=='A'){
                                              echo '                          <option value="A">AMBOS</option>';
                                              }                            
                                    }  
                                    $sqlgenero=mysql_query("SELECT * FROM solicitud where genero='$genero' GROUP BY genero");
                                     while($rowgenero = mysql_fetch_array($sqlgenero))
                                    {
                               $generobd=$rowgenero['genero'];
                                              if($genero!='H'){
                                              echo '                          <option value="H">HOMBRE</option>';
                                              }
                                              if($genero!='M'){
                                              echo '                          <option value="M">MUJER</option>';
                                              }
                                              if($genero!='A'){
                                              echo '                          <option value="A">AMBOS</option>';
                                              }                            
                                    }                     
echo '                      </select>';
echo '                    </div>';
echo '  <br>';
echo '  <br>';

/*echo '<label for="no_alumnos" class="control-label col-sm-5">No ALUMNOS:</label>';
echo '  <div class="col-sm-4">';
echo '      <input type="number" class="form-control input-sm" id="no_alumnos" name="no_alumnos" size="15" maxlength="15" style="text-transform: uppercase" min="1" max="12" required value='.'"'.$row_actualizar["no_alumnos"].'"'.'/>';
echo '  </div> ';
echo '  <br>';
echo '  <br>';*/
					  
echo '                  <label for="horario_inicio" class="control-label col-sm-5">HORA DE ENTRADA:</label>';
echo '                    <div class="col-sm-7">';
echo '                      <input type="time" class="form-control input-sm" id="horario_inicio" name="horario_inicio" required value='.'"'.$row_actualizar["horario_inicio"].'"'.'/>';
echo '                    </div> ';
echo '  <br>';
echo '  <br>';

echo '                  <label for="horario_fin" class="control-label col-sm-5">HORA DE SALIDA:</label>';
echo '                    <div class="col-sm-7">';
echo '                      <input type="time" class="form-control input-sm" id="horario_fin" name="horario_fin" required value='.'"'.$row_actualizar["horario_fin"].'"'.'/>';
echo '                    </div> ';
echo '  <br>';
echo '  <br>';

echo '<label for="nivel_ingles" class="control-label col-sm-5">NIVEL DE INGLES:</label>';
echo '	<div class="col-sm-4">';
echo '		<select class="form-control input-sm" id="nivel_ingles" name="nivel_ingles" value='.'"'.$row["nivel_ingles"].'"'.'>';
                $nivel_buscar=$row["idsolicitud"];
                $sqlsolicito=mysql_query("SELECT * FROM solicitud WHERE idsolicitud=$idsolicitud GROUP BY nivel_ingles");
                while($rowsolicito = mysql_fetch_array($sqlsolicito))
			    {
			    echo'<OPTION VALUE="'.$rowsolicito['nivel_ingles'].'">'.$rowsolicito['nivel_ingles'].'</OPTION>';
			    $nivel_ingles=$row["nivel_ingles"];
			    }
			    $sqlsolicito=mysql_query("SELECT * FROM solicitud WHERE idsolicitud=$idsolicitud GROUP BY nivel_ingles");
                while($rowsolicito = mysql_fetch_array($sqlsolicito))
			    {
				if($nivel_ingles!='A1'){
				echo '                          <option value="A1">A1</option>';
				  }
				if($nivel_ingles!='A2'){
				echo '                          <option value="A2">A2</option>';
				 }
				if($nivel_ingles!='B1'){
				echo '                          <option value="B1">B1</option>';
				 }
				if($nivel_ingles!='B2'){
				echo '                          <option value="B2">B2</option>';
				 }
				if($nivel_ingles!='C1'){
				echo '                          <option value="C1">C1</option>';
				 }
				if($nivel_ingles!='C2'){
				echo '                          <option value="C2">C2</option>';  
														} 
						}                            
echo '                      </select>';
echo '                    </div>';
echo '  <br>';
echo '  <br>';

echo '<label for="semestre" class="control-label col-sm-5">SEMESTRE:</label>';
echo '  <div class="col-sm-4">';
echo '      <input type="number" class="form-control input-sm" id="semestre" name="semestre" size="15" maxlength="15" style="text-transform: uppercase" min="1" max="12" required value='.'"'.$row_actualizar["semestre"].'"'.'/>';
echo '  </div> ';
echo '  <br>';
echo '  <br>';
echo '  <br>';

/*echo '<label for="promedio" class="control-label col-sm-5">PROMEDIO:</label>';
echo '  <div class="col-sm-4">';
echo '      <input type="number" class="form-control input-sm" id="promedio" name="promedio" size="15" maxlength="15" style="text-transform: uppercase" min="1" max="12" required value='.'"'.$row_actualizar["promedio"].'"'.'/>';
echo '  </div> ';
echo '  <br>';
echo '  <br>';

echo '                    <label for="beca" class="control-label col-sm-5">BECA SOLICITADA:</label>';
echo '                      <div class="col-sm-4">';
echo '                        <select class="form-control input-sm" id="beca" name="beca" value='.'"'.$row_actualizar["beca"].'"'.'>';
                                    $beca=$row_actualizar['beca'];
                                    $sqlbeca=mysql_query("SELECT * FROM solicitud where beca='$beca' GROUP BY beca");
                                    while($rowbeca = mysql_fetch_array($sqlbeca))
                                    {
                               $becabd=$rowbeca['beca'];
                                              if($beca=='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($beca=='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }                            
                                    }  
                                    $sqlbeca=mysql_query("SELECT * FROM solicitud where beca='$beca' GROUP BY beca");
                                     while($rowbeca = mysql_fetch_array($sqlbeca))
                                    {
                               $becabd=$rowbeca['beca'];
                                              if($beca!='SI'){
                                              echo '                          <option value="SI">SI</option>';
                                              }
                                              if($beca!='NO'){
                                              echo '                          <option value="NO">NO</option>';
                                              }                            
                                    }                     
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';
					  
echo '<label for="observaciones" class="control-label col-sm-5">OBSERVACIONES: <font color="red"> * </font></label>';
echo '	<div class="col-sm-7">';
echo '		<input type="text" class="form-control input-sm" id="observaciones" name="observaciones" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["observaciones"]).'"'.'/>';
echo '	</div>  ';
echo '  <br>';
echo '  <br>';
					  
echo '<label for="dias" class="control-label col-sm-5">DIAS LABORABLES:</label>';
echo '  <div class="col-sm-7">';
echo '		<label class="checkbox-inline" required >';
echo '          <input type="checkbox" value="Lu" name="lu">Lu</input>';
echo '      </label>';
echo '      <label class="checkbox-inline">';
echo '          <input type="checkbox" value="Ma" name="ma">Ma</input>';
echo '      </label>';
echo '      <label class="checkbox-inline">';
echo '          <input type="checkbox" value="Mi" name="mi">Mi</input>';
echo '      </label>';
echo '      <label class="checkbox-inline">';
echo '          <input type="checkbox" value="Ju" name="ju">Ju</input>';
echo '      </label>';
echo '      <label class="checkbox-inline">';
echo '          <input type="checkbox" value="Vi" name="vi">Vi</input>';
echo '      </label>';
echo '      <label class="checkbox-inline">';
echo '          <input type="checkbox" value="Sa" name="sa">Sa</input>';
echo '      </label>';
echo '  </div>';
echo '  <br>';
echo '  <br>';
echo '  <br>';
echo ' 	<center><font color="red">* campos obligatorios</font></center>';
echo '  <br>';
echo '  <br>';*/
					
echo '	<center>';
echo ' 	 	<button type="submit" class="btn btn-success">Enviar</button>';
echo '  	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '	</center>';
echo '</form>';
?>
