<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Formulario con ventana modal para actualizar especialidad-->
<?php
echo '               <form method="post" action="../queries/actualizar_especialidad.php">';

echo '                  <label for="idespecialidad" class="control-label col-sm-4">CLAVE:</label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="hidden" class="form-control input-sm" id="idespecialidad" name="idespecialidad" style="visibility:hidden;" size="45" maxlength="50" style="text-transform: uppercase" required value='.'"'.$row["idespecialidad"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="idespecialidad" name="idespecialidad" size="45" maxlength="50" style="text-transform: uppercase" required disabled value='.'"'.$row["idespecialidad"].'"'.'/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';

echo '                   <label for="nombre" class="control-label col-sm-4">NOMBRE:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="30" maxlength="100" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row["nombre"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                   <label for="descripcion" class="control-label col-sm-4">DESCRIPCION:</label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="descripcion" name="descripcion" size="30" maxlength="100" style="text-transform: uppercase" onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row["descripcion"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '<center><font color="red"> * Campos obligatorios</font></center>';
echo '<br>';

echo '                  <center>';
echo '                    <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';
echo '               </form>';
?>  
                     