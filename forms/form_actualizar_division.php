<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Formulario para actualizar division-->
<?php
echo '                <form method="post" action="../queries/actualizar_division.php">';

echo '                  <label for="nombre" class="control-label col-sm-4">CLAVE CARRERA:</label>';
echo '                   <div class="col-sm-7">';
echo '                      <input type="hidden" class="form-control input-sm" id="idcarrera" name="idcarrera" size="45" maxlength="50" required  value='.'"'.$row_actualizar["idcarrera"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="clave_carrera" name="clave_carrera" size="45" maxlength="50" style="text-transform: uppercase" disabled value='.'"'.$row_actualizar["clave_carrera"].'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="nombre" class="control-label col-sm-4">NOMBRE:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-7">';
echo '                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="30" maxlength="100" style="text-transform: uppercase" required  onKeyPress="return soloLetras(event)" value='.'"'.utf8_encode($row_actualizar["nombre"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                    <label for="idespecialidad" class="control-label col-sm-4">ESPECIALIDAD:<font color="red"> * </font></label>';
echo '                      <div class="col-sm-7">';
echo '                        <select class="form-control input-sm" id="idespecialidad" name="idespecialidad" value='.'"'.$row["especialidad_idespecialidad"].'"'.'>';
                           		$idespecialidad=$row_actualizar["idespecialidad"];
                                    $sql=mysql_query("SELECT * FROM especialidad where idespecialidad='$idespecialidad'");
                                    while($row = mysql_fetch_array($sql))
			                            {
										echo'<OPTION VALUE="'.$row['idespecialidad'].'">'.$row['idespecialidad'].'</OPTION>';
			                            }
			                         $sql=mysql_query("SELECT * FROM especialidad where idespecialidad!='$idespecialidad'");
                                   while($row = mysql_fetch_array($sql))
			                            {
			                            echo'<OPTION VALUE="'.$row['idespecialidad'].'">'.$row['idespecialidad'].'</OPTION>';
			                            }                                  
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';
echo '<br>';

echo'                     <center><font color="red"> * Campos obligatorios.</font></center>';
echo '<br>';

echo '                  <center>';
echo '                     <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>