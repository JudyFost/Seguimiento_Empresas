<!--Aquí se mandan llamar el archivo Funciones.js para validar los campos que llevan letras y números-->
<script src="../js/funciones.js"></script>
 
<!--Formulario para actualizar empresa-->
<?php
echo '                <form method="post" action="../queries/actualizar_empresa.php">';

echo '                  <label for="nombre" class="control-label col-sm-4">EMPRESA:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="hidden" class="form-control input-sm" id="id_empresa" name="id_empresa" size="45" maxlength="50" required  value='.'"'.$row["idempresa"].'"'.'/>';
echo '                      <input type="text" class="form-control input-sm" id="nombre" name="nombre" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row["nombre"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="rfc" class="control-label col-sm-4">RFC:<font color="red"> * </font></label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="rfc" name="rfc" size="45" maxlength="50" style="text-transform: uppercase" required  value='.'"'.$row["rfc"].'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="razon_social" class="control-label col-sm-4">RAZON SOCIAL:</label>';
echo '                   <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="razon_social" name="razon_social" size="45" maxlength="50" style="text-transform: uppercase" onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row["razon_social"]).'"'.'/>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '<label for="tipo_sector" class="control-label col-sm-4">SECTOR:<font color="red"> * </font></label>';
echo '  <div class="col-sm-6">';
echo '      <select class="form-control input-sm" id='.'"'.'idsector_actualizar_'.$row["idempresa"].'"'.' name='.'"'.'idsector_actualizar_'.$row["idempresa"].'"'.' onchange="javascript:buscar_actualizar_giro('.$row["idempresa"].')">'; 
                $idsector=$row['tipo_sector_idsector'];   
                                    $sqldivision_actualizar=mysql_query("SELECT * FROM giro_comercial where tipo_sector_idsector=$idsector GROUP BY nombre_sector");
                                    while($rowdivision_actualizar = mysql_fetch_array($sqldivision_actualizar))
                                        {
                                        echo'<OPTION VALUE="'.$rowdivision_actualizar['tipo_sector_idsector'].'">'.utf8_encode($rowdivision_actualizar['nombre_sector']).'</OPTION>';                    
                                    $division_actual=$rowdivision_actualizar['tipo_sector_idsector'];
                                        }
                                    $sqldivision=mysql_query("SELECT * FROM giro_comercial GROUP BY nombre_sector order by nombre_sector");  
                                    while($rowdivision = mysql_fetch_array($sqldivision))
                                   	  {
                                   		$division_imprimir=$rowdivision['tipo_sector_idsector'];
                                  		if($division_actual!=$division_imprimir){
                                     		echo'<OPTION VALUE="'.$rowdivision['tipo_sector_idsector'].'">'.utf8_encode($rowdivision['nombre_sector']).'</OPTION>';                    
                                      		}
                                      }				
echo '      </select>';
echo '   </div>';
echo '	 <br>';
echo '	 <br>';

echo ' <label for="giro_comercial" class="control-label col-sm-4">GIRO COMERCIAL:</label>';
echo '   <div class="col-sm-6">';
echo '      <select class="form-control input-sm" id='.'"'.'idgiro_actualizar_'.$row["idempresa"].'"'.' name='.'"'.'idgiro_actualizar_'.$row["idempresa"].'"'.' required>'; 
						            $idgiro=$row["idgiro"];
									$sqlgiro=mysql_query("SELECT * FROM vista_empresa where idgiro='$idgiro' group by nombre_giro;");
                                    while($rowgiro = mysql_fetch_array($sqlgiro))
                            {
                            echo'<OPTION VALUE="'.$rowgiro['idgiro'].'">'.$rowgiro['nombre_giro'].'</OPTION>';
                            } 						
echo '                      </select>';
echo '                    </div>';
echo '					<br>';
echo '					<br>';

echo '                  <label for="tamanio" class="control-label col-sm-4">TAMAÑO:<FONT COLOR="red"> * </FONT></label>';                                               
echo '                    <div class="col-sm-6">';
echo '                      <select class="form-control input-sm" id="tamanio" name="tamanio" value='.'"'.$row["tamanio"].'"'.'>';
							 
							 $sqltam=mysql_query("SELECT tamanio FROM empresa WHERE idempresa=$idempresa");
                                    while($rowtam = mysql_fetch_array($sqltam))
									{
									echo'<OPTION VALUE="'.$rowtam['tamanio'].'">'.$rowtam['tamanio'].'</OPTION>';
										if($rowtam['tamanio']!='MICRO: 0-10'){
											echo '                        <option value="MICRO: 0-10">MICRO: 0-10</option>';
										}
										if($rowtam['tamanio']!='PEQUENA: 11-50'){
											
											echo '                        <option value="PEQUEÑA: 11-50">PEQUEÑA: 11-50</option>';
										}
										if($rowtam['tamanio']!='MEDIANA: 51-250'){
											echo '                        <option value="MEDIANA: 51-250">MEDIANA: 51-250</option>';
										}
										if($rowtam['tamanio']!='GRANDE: MAS 251'){
											echo '                        <option value="GRANDE: MAS 251">GRANDE: MAS 251</option>';
										}
									}
echo '                      </select>';
echo '                    </div>';
echo '<br>';
echo '<br>';

echo '                  <label for="telefono" class="control-label col-sm-4">TELEFONO: <font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="text" class="form-control input-sm" id="telefono" name="telefono" size="45" maxlength="13" required onKeyPress="return soloNumeros(event)" value='.'"'.$row["telefono"].'"'.'/>';
echo '                    </div> ';
echo '</br>';
echo '</br>';

echo '                  <label for="direccion" class="control-label col-sm-4">DIRECCION: <font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                      <input type="text" class="form-control input-sm" id="direccion" name="direccion" size="45" maxlength="50" style="text-transform: uppercase" required onkeypress="return soloLetras(event)" value='.'"'.utf8_encode($row["direccion"]).'"'.'/>';
echo '                    </div>  ';
echo '<br>';
echo '<br>';

echo '                  <label for="email" class="control-label col-sm-4">CORREO:<font color="red"> * </font></label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="email" class="form-control input-sm" id="email" name="email" size="45" maxlength="50" required value='.'"'.utf8_encode($row["email"]).'"'.'/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';

echo '                  <label for="pagina_web" class="control-label col-sm-4">PAGINA WEB:</label>';
echo '                    <div class="col-sm-6">';
echo '                       <input type="pagina_web" class="form-control input-sm" id="pagina_web" name="pagina_web" size="45" maxlength="50" value='.'"'.utf8_encode($row["pagina_web"]).'"'.'/>';
echo '                    </div> ';
echo '<br>';
echo '<br>';
echo '<br>';

echo '<center><font color="red"> * Campos obligatorios </font></center>';
echo '<br>';

echo '                  <center>';
echo '                     <button type="submit" class="btn btn-success">Actualizar</button>';
echo '                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
echo '                  </center>';

echo '             </form>';
?>