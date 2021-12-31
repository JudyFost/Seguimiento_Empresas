<title>Gráfica general solicitudes de las Empresas</title>
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

      $sql = "SELECT count(idsolicitud) from seguimiento_empresas.solicitudes_varios_estatus where status='EN PROCESO';";
      $result = mysql_query ($sql);
      $row=mysql_fetch_row($result);

      $sql2 = "SELECT count(idsolicitud) from seguimiento_empresas.solicitudes_varios_estatus where status='RECHAZADO';";
      $result2 = mysql_query ($sql2);
      $row2=mysql_fetch_row($result2);
	  
	  $sql3 = "SELECT count(idsolicitud) from seguimiento_empresas.solicitudes_varios_estatus where status='FINALIZADO';";
      $result3 = mysql_query ($sql3);
      $row3=mysql_fetch_row($result3);
	  
	  $sql4 = "SELECT count(idsolicitud) from seguimiento_empresas.solicitudes_varios_estatus where status='PENDIENTE';";
      $result4 = mysql_query ($sql4);
      $row4=mysql_fetch_row($result4);


?>


<body>

<div id="container">

  <div class="wideBox">
    <h1>Gráficos estadísticos de las Solicitudes de las Empresas</h1>
    
  </div>

  <canvas id="chart" width="600" height="500"></canvas>

  <table id="chartData">

    <tr>
      <th>SOLICITUD</th><th>TOTAL</th>
     </tr>

    <tr style="color: #0DA068">
      <td>EN PROCESO</td> <?php echo "<td>".$row[0]."</td>"?>
    </tr>

    <tr style="color: #FF0000">
      <td>RECHAZADO</td> <?php echo "<td>".$row2[0]."</td>"?>
    </tr>
	
	<tr style="color: #808080">
      <td>FINALIZADO</td> <?php echo "<td>".$row3[0]."</td>"?>
    </tr>
	
	<tr style="color: #ddd000"">
      <td>PENDIENTE</td> <?php echo "<td>".$row4[0]."</td>"?>
    </tr>
    
  </table>

</div>

</body>



