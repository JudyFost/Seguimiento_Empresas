<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Ventana para captura de nueva empresa-->
     <div class="modal fade" id="window_form_add_empresa" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVA EMPRESA
			  <?php
                  include("../include/conexion.php");
                  $sqlultimo=mysql_query("SELECT MAX(idempresa) AS ultimo FROM seguimiento_empresas.empresa;");
                  while($rowultimo = mysql_fetch_array($sqlultimo))
                  {
                    $ultimo=$rowultimo['ultimo']+1;
                    echo ' '."FOLIO NO.: ".$ultimo;
                  }
               ?>
			  
			  </center></b></h5>
            </div>
            <div class="modal-body">
               <form method="post" action="../queries/guardar_nueva_empresa.php" class="">
				  
				  <label for="idempresa" class="control-label col-sm-4">EMPRESA:<font color="red"> * </font></label>
                    <div class="col-sm-6">
					<?php
                    echo '<input type="hidden" class="form-control input-sm" id="idempresa" name="idempresa" maxlength="13" placeholder="ID EMPRESA" onKeyPress="return soloNumeros(event)" value='.$ultimo.' required />';
                    ?>
					  <input type="text" class="form-control input-sm" id="nombre" name="nombre" maxlength="100" style="text-transform: uppercase" placeholder="NOMBRE EMPRESA" onKeyPress="return soloLetras(event)" required />
                    </div>
					  <br>
					  <br>
					  
                  <label for="rfc" class="control-label col-sm-4">RFC:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                       <input type="text" class="form-control input-sm" id="rfc" name="rfc" maxlength="13"  style="text-transform: uppercase" placeholder="ESCRIBA RFC" required />
                    </div> 
					  <br>
					  <br>
					  
                  <label for="razon_social" class="control-label col-sm-4">RAZON SOCIAL:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="razon_social" name="razon_social" maxlength="45" style="text-transform: uppercase" value="NO TIENE" onkeypress="return soloLetras(event)" />
                    </div>
					  <br>
					  <br>

                  <label for="tipo_sector" class="control-label col-sm-4">SECTOR:<font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="tipo_sector" name="tipo_sector" onchange="buscar_giro()" required>
                          <?php
                              include("../include/conexion.php");
                                    $sqlsector=mysql_query("SELECT * FROM tipo_sector ORDER BY idsector");
                                     echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
                                    while($rowsector = mysql_fetch_array($sqlsector))
                            {
                            echo'<OPTION VALUE="'.$rowsector['idsector'].'">'.$rowsector['nombre'].'</OPTION>';
                            }
                            ?> 
                      </select>
                    </div>
					<br>
					<br>
					
                    <label for="giro_comercial" class="control-label col-sm-4">GIRO:<font color="red"> * </font></label>
                      <div class="col-sm-6">
                        <select class="form-control input-sm" id="giro_comercial" name="giro_comercial" required>

                        </select>
                      </div>
					<br>
					<br>				  

				  <label for="tamanio" class="control-label col-sm-4">TAMAÑO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="tamanio" name="tamanio">
                        <option value="MICRO: 0-10">MICRO: 0-10</option>
                        <option value="PEQUEÑA: 11-50">PEQUEÑA: 11-50</option>
                        <option value="MEDIANA: 51-250">MEDIANA: 51-250</option>
                        <option value="GRANDE: MAS 251">GRANDE: MAS 251</option>
                      </select>
                    </div>
					<br>
					<br>
					
				  <label for="telefono" class="control-label col-sm-4">TELEFONO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="telefono" name="telefono" maxlength="13" placeholder="7121210000" onKeyPress="return soloNumeros(event)" required />
                    </div>
					  <br>
					  <br>
					
				  <label for="direccion" class="control-label col-sm-4">DIRECCION:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="direccion" name="direccion" maxlength="24" style="text-transform: uppercase" placeholder="DIRECCION" onkeypress="return soloLetras(event)" required />
                    </div>
					  <br>
					  <br>
					  
                  <label for="correo" class="control-label col-sm-4">CORREO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="email" class="form-control input-sm"  id="email" name="email" maxlength="25" placeholder="example@gmail.es" required />
                    </div>
					  <br>
					  <br>
					  
				  <label for="pagina_web" class="control-label col-sm-4">PÁGINA WEB:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="pagina_web" name="pagina_web" maxlength="24" placeholder="PAGINA WEB" />
                    </div>
					  <br>
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
