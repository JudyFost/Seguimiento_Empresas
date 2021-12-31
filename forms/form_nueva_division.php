<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>

<!--Ventana modal para captura del responsable carrera(division)-->
     <div class="modal fade" id="window_form_add_division" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVA CARRERA</center></b>
			  
			   <?php
                  include("../include/conexion.php");
                  $sql_consulta=mysql_query("SELECT MAX(idcarrera) AS ultimo FROM carrera;");
                  while($rowultimo = mysql_fetch_array($sql_consulta))
                  {
                    $ultimo=$rowultimo['ultimo']+1;
                    echo ' '."FOLIO NO.: ".$ultimo;
                  }
               ?>
			  </h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../queries/guardar_nueva_division.php" class="">
				
				    <label for="clave_carrera" class="control-label col-sm-4">CLAVE:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="clave_carrera" name="clave_carrera" size="30" maxlength="100"  style="text-transform: uppercase" placeholder="CLV-CARRERA" required />
                    </div>
                    <br>
					<br>					

					<label for="nombre_carrera" class="control-label col-sm-4">NOMBRE:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="nombre_carrera" name="nombre_carrera" size="30" maxlength="100" style="text-transform: uppercase" onKeyPress="return soloLetras(event)" placeholder="NOMBRE CARRERA" required />
                    </div>
                    <br>
					<br>

                  <label for="especialidad_idespecialidad" class="control-label col-sm-4">ESPECIALIDAD:</label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="idespecialidad" name="idespecialidad" required  >
                          <?php
                              include("../include/conexion.php");
                                    $sql=mysql_query("SELECT * FROM especialidad order by idespecialidad");
                                    echo'<OPTION VALUE="">'.'- Seleccionar -'.'</OPTION>';
                                    while($row = mysql_fetch_array($sql))
                            {
                            echo'<OPTION VALUE="'.$row['idespecialidad'].'">'.$row['idespecialidad'].'</OPTION>';
                            }
                            ?> 
                      </select>
                    </div>
                    <br>
                    <br>
					<br>
					
				  <center>
					<b><font color="red"> * Campos obligatorios</font></b>
				  </center>
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
