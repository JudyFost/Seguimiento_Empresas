<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Ventana modal para captura del responsable departamento-->
     <div class="modal fade" id="window_form_add_responsable" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title" style="color:black;"><b><center>NUEVO DEPARTAMENTO</center></b></h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../queries/guardar_nuevo_departamento_per.php" class="">

                  <label for="empresa_idempresa" class="control-label col-sm-4">EMPRESA:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <select class="form-control input-sm" id="idempresa" name="idempresa" required  >
                          <?php
                              include("../include/conexion.php");
							        $idusuario_user=$_SESSION["idusuario"];
                                    $sql=mysql_query("SELECT * FROM responsable_empresa where nombre_empresa LIKE '$txtabuscar%' AND idusuario='$idusuario_user' order by iddepartamento");
                                    echo'<OPTION VALUE="">'.'- Seleccionar -'.'</OPTION>';
                                    while($row = mysql_fetch_array($sql))
                            {
                            echo'<OPTION VALUE="'.$row['idempresa'].'">'.utf8_encode($row['nombre_empresa']).'</OPTION>';
                            }
                            ?> 
                      </select>
                    </div>
                    <br>
                    <br>
					
                  <label for="responsable" class="control-label col-sm-4">RESPONSABLE:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                         <select class="form-control input-sm" id="idusuario" name="idusuario" required>
                          <?php
                              include("../include/conexion.php");
                              echo'<OPTION VALUE="">'.'- Seleccionar -'.'</OPTION>';
                                    $sql=mysql_query("SELECT * FROM usuario where tipo_usuario_idtipo_usuario=4 order by nombre");
                                    while($row = mysql_fetch_array($sql))
                            {
                            echo'<OPTION VALUE="'.$row['idusuario'].'">'.utf8_encode($row['nombre'])." ".utf8_encode($row['apellido_paterno'])." ".utf8_encode($row['apellido_materno']).'</OPTION>';
                            }
                            ?> 
                      </select> 
                    </div>
                    <br>
					<br>
					
					
					
					
					<label for="nombre_departamento" class="control-label col-sm-4">DEPARTAMENTO:<font color="red"> * </font></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control input-sm" id="nombre_departamento" name="nombre_departamento" size="30" maxlength="100"  style="text-transform: uppercase" onKeyPress="return soloLetras(event)" required placeholder="NOMBRE DEPARTAMENTO"/>
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
