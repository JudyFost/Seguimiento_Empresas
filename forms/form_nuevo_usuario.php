<!--Aquì se manda llamar el archivo funciones.js (El cual sirve para validar los campos que llevan solo letras o números)-->
<script src="../js/funciones.js"></script>

</script> 
<!--Ventana para captura de nuevo usuario responsable-->
     <div class="modal fade" id="window_form_add_user" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVO USUARIO</center></b></h5>
            </div>
            <div class="modal-body">
               <form method="post" action="../queries/guardar_nuevo_usuario.php" class="">
                  <label for="id_usuario" class="control-label col-sm-4">USUARIO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
					  <input type="text" class="form-control input-sm" id="idusuario" name="idusuario" maxlength="13" placeholder="NOMBRE USUARIO" required />
                    </div>
					  <br>
					  <br>
                  <label for="nombre" class="control-label col-sm-4">NOMBRE (S):<font color="red"> * </font></label>
                    <div class="col-sm-6">
                       <input type="text" class="form-control input-sm" id="nombre" name="nombre" maxlength="23"  style="text-transform: uppercase" placeholder="NOMBRE COMPLETO" onkeypress="return soloLetras(event)" required />
                    </div> 
					  <br>
					  <br>
                  <label for="ap_paterno" class="control-label col-sm-4">APELLIDO PATERNO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="ap_paterno" name="ap_paterno" maxlength="24" style="text-transform: uppercase" placeholder="APELLIDO PATERNO" onkeypress="return soloLetras(event)" required />
                    </div>
					  <br>
					  <br>
                  <label for="nombre" class="control-label col-sm-4">APELLIDO MATERNO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="ap_materno" name="ap_materno" maxlength="24" style="text-transform: uppercase" placeholder="APELLIDO MATERNO" onkeypress="return soloLetras(event)" required />
                    </div>
					  <br>
					  <br>
                  <label for="tipo_usuario" class="control-label col-sm-4">TIPO USUARIO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="tipo_usuario" name="tipo_usuario" required>
                        <option value="">- Selecciona -</option>
						  <option value="1">ADMINISTRADOR</option> 
						  <option value="3">RESPONSABLE EMPRESA</option>
						  <option value="4">PERSONAL DE LA EMPRESA</option>
						  <option value="5">JEFE DE DIVISIÓN (TESJO)</option>
						  <option value="6">JEFE DE DEPARTAMENTO (TESJO)</option>
                      </select>
                    </div> 
					  <br>
					  <br>					
   				  <label for="puesto" class="control-label col-sm-4">PUESTO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="puesto" name="puesto" maxlength="70" style="text-transform: uppercase" placeholder="ENCARGADO RESPONSABLE" onkeypress="return soloLetras(event)" required />
                    </div>
					  <br>
					  <br>
				  <label for="sexo" class="control-label col-sm-4">SEXO:<font color="red"> * </font></label>
					<div class="col-sm-6">
					 <center>
					  <input type="radio" name="sexo" value="H" required /> HOMBRE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input type="radio" name="sexo" value="M" required /> MUJER<br>
					 </center>
						<?php
						if ($OK == "evento1") {
						echo " ".$sexo."<br>";
						};
						?>
					</div>	
					<br>
					<br>
                  <label for="correo" class="control-label col-sm-4">CORREO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="email" class="form-control input-sm"  id="correo" name="correo" maxlength="25" placeholder="example@gmail.es" required />
                    </div>
					  <br>
					  <br>
                  <label for="telefono" class="control-label col-sm-4">TELEFONO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="telefono" name="telefono" maxlength="13" placeholder="7121210000" onKeyPress="return soloNumeros(event)" required />
                    </div>
					  <br>
					  <br>
				  <label for="direccion" class="control-label col-sm-4">DIRECCIÓN:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="direccion" name="direccion" maxlength="30" style="text-transform: uppercase" placeholder="EJEMPLO: TOLUCA" onkeypress="return soloLetras(event)" required />
                    </div>
					  <br>
					  <br>
                  <label for="password" class="control-label col-sm-4">CONTRASEÑA:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control input-sm" id="password" name="password" maxlength="30" placeholder="CONTRASEÑA" required />
                    </div>
					  <br>
					  <br>
					  <br>

                  <center>
				    <font color="red"> * Campos obligatorios</font>
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


