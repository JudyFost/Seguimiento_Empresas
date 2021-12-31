<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>


<!--Ventana para captura de nueva especialidad-->
     <div class="modal fade" id="window_form_add_especialidad" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVA ESPECIALIDAD</center></b></h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../queries/guardar_nueva_especialidad.php">
                   
                  <label for="idespecialidad" class="control-label col-sm-4">CLAVE: </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="idespecialidad" name="idespecialidad" size="45" maxlength="50" style="text-transform: uppercase" placeholder="CLAVE" />
                    </div>				
					<br>
					<br>
			      <label for="nombre" class="control-label col-sm-4">NOMBRE:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="45" maxlength="50" style="text-transform: uppercase" onkeypress="return soloLetras(event)" placeholder="NOMBRE" required />
                    </div>					
					<br>
					<br>
				  <label for="descripcion" class="control-label col-sm-4">DESCRIPCIÓN:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="descripcion" name="descripcion" size="45" maxlength="50" style="text-transform: uppercase" onkeypress="return soloLetras(event)" placeholder="DESCRIPCIÓN" />
                    </div>				
					<br>
					<br>
				  <center>
				    <b><font color="red"> * Campos obligatorios</font></b>
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
