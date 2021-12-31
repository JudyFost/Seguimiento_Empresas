<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<?
header("Content-Type: text/html;charset=utf-8");
?>
<!--Ventana para captura de nueva materia-->
     <div class="modal fade" id="window_form_add_materia" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVA MATERIA</center></b></h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../queries/guardar_nueva_materia.php">
			
                  <label for="clave" class="control-label col-sm-4">CLAVE MATERIA:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="clave" name="clave" size="12" maxlength="12" placeholder="CLAVE" required />
					</div>
					<br>
					<br>
					
                  <label for="nombre" class="control-label col-sm-4">NOMBRE:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="100" maxlength="100" style="text-transform: uppercase" onkeypress="return soloLetras(event)" placeholder="NOMBRE" required />
                    </div>
                    <br>
					<br>

                  <label for="creditos" class="control-label col-sm-4">CRÉDITOS:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="creditos" name="creditos" size="2" maxlength="2"  onKeyPress="return soloNumeros(event)" placeholder="CRÉDITOS" required /><br>
                    </div>         
                    <br>
					<br>
					<br>
				
   				  <center>
					<b><font color="red">* Campos obligatorios</font></b>
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
