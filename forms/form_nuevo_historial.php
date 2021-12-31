<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Ventana para captura de un nuevo historial-->
     <div class="modal fade" id="window_form_add_history" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVO SEGUIMIENTO ACADÉMICO</center></b></h5>
            </div>
            <div class="modal-body">
               <form method="post" action="../queries/guardar_nuevo_historial.php" class="">
                  <label for="idcontrol" class="control-label col-sm-4">No. CONTROL:<font color="red"> * </font></label>
                    <div class="col-sm-6">
					    <select class="form-control input-sm" id="idcontrol" name="idcontrol" required>
                          <?php
                              include("../include/conexion.php");
                                    $sqlusuario=mysql_query("SELECT * FROM usuario where tipo_usuario_idtipo=2 ORDER BY idusuario");
                                     echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
                                    while($rowusuario = mysql_fetch_array($sqlusuario))
                            {
                            echo'<OPTION VALUE="'.$rowusuario['idusuario'].'">'.$rowusuario['idusuario'].'</OPTION>';
                            }
                            ?> 
                      </select>
                    </div>
					  <br>
					  <br>
					  
                  <label for="semestre" class="control-label col-sm-4">SEMESTRE:<font color="red"> * </font></label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control input-sm" name="semestre" min="4" max="13" placeholder="4" required>
                    </div>
					<br>
					<br>
					
				  <label for="seguro_facultativo" class="control-label col-sm-4">SEGURO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="seguro_facultativo" name="seguro_facultativo" required>
                        <option value="">-Selecciona-</option>
						<option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                    </div>
					<br>
					<br>
					  
                  <label for="creditos_actuales" class="control-label col-sm-4">CRÉDITOS ACTUALES:</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control input-sm" id="creditos_actuales" name="creditos_actuales" min="20" max="100" placeholder="20" onkeypress="return soloNumeros(event)" required />
                    </div>
					  <br>
					  <br>
				  <label for="situacion_alumno_clave" class="control-label col-sm-4">SITUACIÓN ALUMNO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="situacion_alumno_clave" name="situacion_alumno_clave" required>
					    <OPTION VALUE="">- Selecciona -</OPTION>
                        <option value="A">ACTIVO</option>
                        <option value="B">BAJA</option>
                        <option value="BT">BAJA TEMPORAL</option>
						<option value="E">EGRESADO</option>
                      </select>
                    </div>
					<br>
					<br>
					
					<label for="tipo_alumno_clave" class="control-label col-sm-4">TIPO ALUMNO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="tipo_alumno_clave" name="tipo_alumno_clave" required>
					    <OPTION VALUE="">- Selecciona -</OPTION>
						 <option value="AI">ALUMNO TESJO</option>
						 <option value="AQ">ALUMNO DE EQUIVALENCIA</option>
						 <option value="AE">ALUMNO EGRESADO</option>
						 <option value="AT">ALUMNO TITULADO</option>
						 <option value="AA">ALUMNO EXTENSIÓN ACULCO</option>    
                      </select>
                    </div>
					<br>
					<br>
                    
					<label for="carrera_idcarrera" class="control-label col-sm-4">DIVISION:<font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="carrera_idcarrera" name="carrera_idcarrera" onchange="buscar_especialidad()"required>
                          <?php
                              include("../include/conexion.php");
                                    $sqldivision=mysql_query("SELECT * FROM carrera GROUP BY nombre ");
                                    echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
                                    while($rowdivision = mysql_fetch_array($sqldivision))
                            {
                            echo'<OPTION VALUE="'.$rowdivision['idcarrera'].'">'.utf8_encode($rowdivision['nombre']).'</OPTION>';
                            }
                            ?> 
                      </select>
                    </div>
					<br>
                    <br>

				  <label for="servicio_social" class="control-label col-sm-4">SERVICIO SOCIAL:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="servicio_social" name="servicio_social" required>
                        <option value="">-Selecciona-</option>
						<option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                    </div>
					<br>
					<br>
					
				  <label for="residencia_profesional" class="control-label col-sm-4">RESIDENCIA:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="residencia_profesional" name="residencia_profesional" required>
                        <option value="">-Selecciona-</option>
						<option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                    </div>
					<br>
					<br>
					
				<label for="proyecto_dual" class="control-label col-sm-4">PROYECTO DUAL:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="proyecto_dual" name="proyecto_dual" required>
                        <option value="">-Selecciona-</option>
						<option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                    </div>
					<br>
					<br>
										  
				  <center>
				    <b><font color="red"> * Campos obligatorios</font></b>
				  </center>
				     <br>
					 <br>
					
                  <center>
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </center>
               </form>
            </div>
          </div>
        </div>
      </div>
