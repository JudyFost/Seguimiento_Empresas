<!--Ventana para captura de nueva relacion especialidad materia-->
     <div class="modal fade" id="window_form_add_especialidad_materia" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>RELACION ESPECIALIDAD MATERIA</center></b></h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../queries/guardar_nueva_relacion_especialidad_materia.php">
                   
				    <label for="especialidad" class="control-label col-sm-4">ESPECIALIDAD: <font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="especialidad" name="especialidad">
                          <option value="">- Selecciona -</option>
						  <?php
                              include("../include/conexion.php");
                                    $sql=mysql_query("SELECT * FROM especialidad");
                                    while($row = mysql_fetch_array($sql))
                            {
							echo'<OPTION VALUE="'.$row['idespecialidad'].'">'.$row['idespecialidad']." - ".utf8_encode($row['nombre'])." - ".utf8_encode($row['descripcion']).'</OPTION>';
                            }
                            ?> 
                      </select>
                    </div>
					  <br>
					  <br>
				   
                    <label for="clave" class="control-label col-sm-4">CLAVE MATERIA:<font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="clave" name="clave">
                         <option value="">- Selecciona -</option>
						 <?php
                              include("../include/conexion.php");
                                    $sql=mysql_query("SELECT * FROM materia");
                                    while($row = mysql_fetch_array($sql))
                            {
                            echo'<OPTION VALUE="'.$row['clave'].'">'.$row['clave']." - ".utf8_encode($row['nombre']).'</OPTION>';
                            }
                            ?> 
                        </select>
                      </div>
					  <br>
					  <br>
					  <br> 
					  
				    <center>
					  <b><font color="red"> * Campos obligatorios</font></br>
					</center>
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

