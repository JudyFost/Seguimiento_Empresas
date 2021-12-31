<!--Ventana para captura de nueva solicitud-->
     <div class="modal fade" id="window_form_add_solicitud" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVA SOLICITUD
               <?php
                  include("../include/conexion.php");
                  $sqlultimo=mysql_query("SELECT MAX(idsolicitud) AS ultimo FROM solicitud ;");
                  while($rowultimo = mysql_fetch_array($sqlultimo))
                  {
                    $ultimo=$rowultimo['ultimo']+1;
                    echo ' '."FOLIO NO.: ".$ultimo;
                  }
               ?> 
              </center></b></h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../queries/guardar_nueva_solicitud_empresa.php" class="">
                    <?php
                    echo '<input type="hidden" value='.$ultimo.' name="folio_siguiente" />';
                    ?>
                    <label for="fecha_max" class="control-label col-sm-6">VENCIMIENTO DE LA SOLICITUD: <font color="red"> * </font></label>
                      <div class="col-sm-4">
                          <input type="date" class="form-control input-sm"  id="fecha_max" name="fecha_max" required/>
                      </div>
					    <br>
					    <br>
                    <label for="empresa" class="control-label col-sm-4">EMPRESA: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="empresa" name="empresa" onchange="buscar_departamento()" required>
                          <?php
                              include("../include/conexion.php");
                              $idusuario_user=$_SESSION["idusuario"];
                                    $sqlempresa=mysql_query("SELECT * FROM responsable_empresa WHERE idusuario='$idusuario_user'  order by idempresa");
                                     echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
                                    while($rowempresa = mysql_fetch_array($sqlempresa))
                            {
                            echo'<OPTION VALUE="'.$rowempresa['idempresa'].'">'.utf8_encode($rowempresa['nombre_empresa']).'</OPTION>';
                            }
                            ?> 
                        </select>
                       </div>
					     <br>
					     <br>
                    <label for="departamento" class="control-label col-sm-4">DEPARTAMENTO: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="departamento" name="departamento" onchange="buscar_responsable()" required>

                        </select>
                      </div>
					     <br>
					     <br>
                     <label for="responsable" class="control-label col-sm-4">RESPONSABLE: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="responsable" name="responsable" required>
                        </select>
                      </div> 
					     <br>
					     <br>
                    <label for="idtipo_solicitud" class="control-label col-sm-4">SOLICITUD: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="idtipo_solicitud" name="idtipo_solicitud" required>
                          <?php
                              include("../include/conexion.php");
                                    $sqlsolicitud=mysql_query("SELECT * FROM tipo_solicitud ORDER BY descripcion");
                                    echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
                                    while($rowsolicitud = mysql_fetch_array($sqlsolicitud))
                            {
                            echo'<OPTION VALUE="'.$rowsolicitud['idtipo_solicitud'].'">'.$rowsolicitud['descripcion'].'</OPTION>';
                            }
                            ?> 
                        </select>
                      </div>
					     <br>
					     <br>
                    <label for="iddivision" class="control-label col-sm-4">DIVISION: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="division" name="division"  onchange="buscar_especialidad()" required>
                          <?php
                              include("../include/conexion.php");
                                    $sqldivison=mysql_query("SELECT * FROM carrera GROUP BY nombre ");
                                    echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
                                    while($rowdivision = mysql_fetch_array($sqldivison))
                            {
                            echo'<OPTION VALUE="'.$rowdivision['idcarrera'].'">'.utf8_encode($rowdivision['nombre']).'</OPTION>';
                            }
                            ?> 
                      </select>
                    </div>
					     <br>
					     <br>
                    <label for="especialidad" class="control-label col-sm-4">ESPECIALIDAD: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="especialidad" name="especialidad" required>      
                        </select>
                      </div>
					     <br>
					     <br>
                    <label for="genero" class="control-label col-sm-4">GENERO: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="genero" name="genero" required>
                          <option value="">- Selecciona -</option>
                          <option value="H">HOMBRE</option>
                          <option value="M">MUJER</option>
                          <option value="A">AMBOS</option>
                        </select>
                      </div>
					     <br>
					     <br>
                     <label for="no_alumnos" class="control-label col-sm-4">ALUMNOS:</label>
						<div class="col-sm-6">
						  <input type="number" class="form-control input-sm" id="no_alumnos" name="no_alumnos" value="1" min="1" max="99" required/>
						</div>
						 <br />
						 <br />
                    <label for="horario_inicio" class="control-label col-sm-4">HORA INICIO:</label>
                      <div class="col-sm-6">
                        <input type="time" class="form-control input-sm" id="horario_inicio" name="horario_inicio" VALUE="09:00:00" required/>
                      </div>
					     <br />
					     <br />
                    <label for="horario_fin" class="control-label col-sm-4">HORA FIN:</label>
                      <div class="col-sm-6">
                        <input type="time" class="form-control input-sm" id="horario_fin" name="horario_fin" VALUE="18:00:00" required/>
                      </div>
					     <br />
					     <br />
                      <label for="nivel_ingles" class="control-label col-sm-4">NIVEL INGLES: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="nivel_ingles" name="nivel_ingles" required>
                          <option value="">- Selecciona -</option>
                          <option value="A1">A1</option>
                          <option value="A2">A2</option>
                          <option value="B1">B1</option>
                          <option value="B2">B2</option>
                          <option value="C1">C1</option>
                          <option value="C2">C2</option>
                      </select>
                    </div>
					     <br>
					     <br>
                     <label for="semestre" class="control-label col-sm-4">SEMESTRE:</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control input-sm" id="semestre" name="semestre" size="15" maxlength="15" value="6" min="1" max="12"required />
                      </div>
					     <br>
					     <br>
                     <label for="promedio" class="control-label col-sm-4">PROMEDIO:</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control input-sm" id="promedio" name="promedio" size="15" maxlength="15" value="70" min="70" max="100"required/>
                      </div>
					     <br>
					     <br>
                     <label for="beca" class="control-label col-sm-4">BECA: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="beca" name="beca" required>
                          <option value="">- Selecciona -</option>
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
					  </div> 
							 <br>
							 <br>
                     <label for="observaciones" class="control-label col-sm-4">OBSERVACIONES:</label>
					  <div class="col-sm-6">
						  <input type="text" class="form-control input-sm" id="observaciones" name="observaciones" size="45" maxlength="50" style="text-transform: uppercase" /><br>
					  </div> 
							 <br>
							 <br>
                     <label for="dias" class="control-label col-sm-4">DIAS LABORABLES:</label>
                      <div class="col-sm-7">
                          <label class="checkbox-inline">
                            <input type="checkbox" value="Lu" name="lu">Lu</input>
                          </label>
                          <label class="checkbox-inline">
                            <input type="checkbox" value="Ma" name="ma">Ma</input>
                          </label>
                          <label class="checkbox-inline">
                            <input type="checkbox" value="Mi" name="mi">Mi</input>
                          </label>
                          <label class="checkbox-inline">
                            <input type="checkbox" value="Ju" name="ju">Ju</input>
                          </label>
                          <label class="checkbox-inline">
                            <input type="checkbox" value="Vi" name="vi">Vi</input>
                          </label>
                          <label class="checkbox-inline">
                            <input type="checkbox" value="Sa" name="sa">Sa</input>
                          </label>
                      </div>
                         <br>
					     <br>
						 <label for="encargado" class="control-label col-sm-4">ENCARGADO DE SOLICITUD:<font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="encargado" name="encargado" required>
                          <?php
                           include("../include/conexion.php");
							 $idusuario_user=$_SESSION["idusuario"];
                               $sqlencargado=mysql_query("SELECT * FROM seguimiento_empresas.usuario where idusuario='$idusuario_user' order by idusuario;");
                                    while($rowencargado = mysql_fetch_array($sqlencargado))
                            {
                            echo'<OPTION VALUE="'.$rowencargado['idusuario'].'">'.utf8_encode($rowencargado['nombre']).' '.utf8_encode($rowencargado['apellido_paterno']).' '.utf8_encode($rowencargado['apellido_materno']).'</OPTION>';
                            }				
                       ?> 
                      </select>
                    </div>
					<br>
					<br>
						  <center><font color="red">* Campos obligatorios</font></center>
					     <br>					  
                  <center>
                    <button type="submit" class="btn btn-success">Enviar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </center>
               </form>
            </div>
          </div>
        </div>
      </div>
