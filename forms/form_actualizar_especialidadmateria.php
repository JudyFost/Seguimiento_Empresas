<?php
echo '               <form method="post" action="../queries/actualizar_especialidadmateria.php">';

echo '                    <label for="idespecialidad" class="control-label col-sm-4">ESPECIALIDAD:</label>';
echo '                      <div class="col-sm-6">';
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

echo '                    <label for="clave" class="control-label col-sm-4">CLAVE MATERIA:</label>';
echo '                      <div class="col-sm-6">';
echo '                        <select class="form-control input-sm" id="clave_materia" name="clave_materia" value='.'"'.$row["materia_clave"].'"'.'>';
                           		$clave_materia=$row_actualizar["clave_materia"];
                                    $sql=mysql_query("SELECT * FROM materia where clave='$clave_materia'");
                                    while($row = mysql_fetch_array($sql))
			                            {
									    echo'<OPTION VALUE="'.$row['clave'].'">'.$row['clave']."-".utf8_encode($row['nombre']).'</OPTION>';
			                            }
			                         $sql=mysql_query("SELECT * FROM materia where clave!='$clave_materia'");
                                   while($row = mysql_fetch_array($sql))
			                            {
			                            echo'<OPTION VALUE="'.$row['clave'].'">'.$row['clave']."-".utf8_encode($row['nombre']).'</OPTION>';
			                            }                                  
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="idespecialidad_materia" class="control-label col-sm-4" style="visibility:hidden">NOMBRE:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="hidden" class="form-control input-sm" id="idespecialidad_materia" name="idespecialidad_materia" size="45" maxlength="50" required  value='.'"'.$row_actualizar["idespecialidad_materia"].'"'.'/>';
echo '                    </div>';
echo '<br>';

echo '                  <center>';
echo '                    <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';
echo '               </form>';
?>  
                     