<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>


<?php
header("Content-Type: text/html;charset=utf-8");
echo '               <form method="post" action="../queries/actualizar_materia.php">';
echo '                      <input type="hidden" class="form-control input-sm" id="clave" name="clave" size="30" maxlength="30" style="text-transform: uppercase" required value='.'"'.$row["clave"].'"'.'/>';

echo '                   <label for="clave" class="control-label col-sm-4">CLAVE MATERIA:</label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="clave" name="clave" size="30" maxlength="10" style="text-transform: uppercase" required disabled value='.'"'.$row["clave"].'"'.'/>';
echo '                    </div>';
echo '                    <br> ';
echo '                    <br> ';

echo '                  <label for="nombre" class="control-label col-sm-4">NOMBRE:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="100" maxlength="100" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row["nombre"]).'"'.'/>';
echo '                    </div> ';
echo '                    <br> ';
echo '                    <br> ';

echo '                  <label for="creditos" class="control-label col-sm-4">CRÉDITOS:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="creditos" name="creditos" size="1" maxlength="1" required onkeypress="return soloNumeros(event)" value='.'"'.$row["creditos"].'"'.'/>';
echo '                    </div> ';
echo '                    <br> ';
echo '                    <br> ';
echo '                    <br> ';
echo '<center><font color="red"> * Campos obligatorios</font></center>';
echo '                    <br> ';

echo '                  <center>';
echo '                    <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';
echo '               </form>';
?>  
            