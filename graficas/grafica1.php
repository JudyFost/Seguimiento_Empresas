<title>GRÁFICA GENERAL (ALUMNOS REGISTRADOS AGENDA EMPRESARIAL TESJO)</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

<?php
// Datos para la conexion
$host = 'localhost';
$database = 'seguimiento_empresas';
$username = 'root';
$password = 'josediaz';

// Conectarse a MySQL
$link = mysql_connect($host, $username, $password);
if (!$link) {
    die('Error al conectarse a mysql: ' . mysql_error());
}

// Seleccionar nuestra base de datos
$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ('Error al abrir la base de datos: ' . mysql_error());
}
else {
 
}

      $sql = "SELECT count(idusuario) from usuario where tipo_usuario_idtipo_usuario='2' and sexo='H'";
      $result = mysql_query ($sql);
      $row=mysql_fetch_row($result);

      $sql2 = "SELECT count(idusuario) from usuario where tipo_usuario_idtipo_usuario='2' and sexo='M'";
      $result2 = mysql_query ($sql2);
      $row2=mysql_fetch_row($result2);


?>


<body>

<div id="container">

  <div class="wideBox">
    <h1>Gráfico estadístico de los alumnos registrados (Sexo)</h1>
    
  </div>

  <canvas id="chart" width="600" height="500"></canvas>

  <table id="chartData">

    <tr>
      <th>Sexo</th><th>Total</th>
     </tr>

    <tr style="color: #0DA068">
      <td>Hombres</td> <?php echo "<td>".$row[0]."</td>"?>
    </tr>

    <tr style="color: #ddd000">
      <td>Mujeres</td> <?php echo "<td>".$row2[0]."</td>"?>
    </tr>    
  </table>

</div>

</body>



