<!--Método para invocar la sesion de un Personal antes de manipularlo-->
<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<style>
	.button {
		background-color: #e7e7e7e7; /* Green */
		border: none;
		color: black;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}
	.button1 {padding: 10px 24px;}
	</style>
  </head>
     
  <body onload="buscarusuario()">  
      <div id="header-login">
         <?php 
         include ('../header/header_superadministrador.php');
         ?>
      </div>	  
	  
	  <!--Formulario de Agregar personal-->
            <div class="form-group col-xs-12"> 	
          		<?php
                echo ' <div class="container">';
			    echo '  <h2>Menú de Ayuda (General)</h2>';
				echo '  <p><strong>Nota:</strong> Da un <strong>clic</strong> sobre la consulta que deseas realizar (Automáticamente se desplará un formulario con la información requerida)</p>';
				echo '  <div class="panel-group" id="accordion">';
				
				echo '<div class="panel panel-success">';
                echo '    <div class="panel panel-success">';
				echo '      <div class="panel-heading">';
				echo '        <h4 class="panel-title">';
				echo '          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><div class="panel-heading">Menú de Ayuda <i class="fa fa-question-circle" aria-hidden="true"></i> (Solicitud) <i class="fa fa-sticky-note fa-2x" aria-hidden="true"></i>       <center><i class="fa fa-angle-down" aria-hidden="true"> Desglosa aquí</i></center></div></a>';
				echo '        </h4>';
				echo '      </div>';
				echo '      <div id="collapse1" class="panel-collapse collapse">';
				echo '    <div class="panel panel-default">';
				echo '      <div class="panel-heading">';
				echo '        <h4 class="panel-title">';
				echo '          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><b>Agregar solicitud</b></a>';
				echo '        </h4>';
				echo '      </div>';
				echo '      <div id="collapse2" class="panel-collapse collapse">';
				echo '        <div class="panel-body">Pasos para agregar una <b>Solicitud</b>:<br><br>';
				echo '        <b>Paso 1.-</b> Ir a la pestaña <button class="button button1">Solicitudes</button><br><br>';
				echo '        <b>Paso 2.-</b> Ir al botón   <button type="button" class="btn btn-default"><font color="green"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"> Agregar Solicitud</i></font></button><br><br>';
				echo '        <b>Paso 3.-</b> Llenar el formulario </b><b>NUEVA SOLICITUD FOLIO No.:</b><br><br>';
				echo '        <b>Paso 4.-</b> Dar clic en el botón <button type="button" class="btn btn-success">Guardar</button> (Si es que se desea guardar) ó bien  en el botón   <button type="button" class="btn btn-default">Cancelar</button> (Si es que no se desean guardar los datos de la solicitud).<br><br>';
				echo '        Si los datos ingresados fueron correctos, <b>aparecerá el siguiente mensaje:</b><br><br>';
	            echo '        <div class="alert alert-success alert-dismissible fade in">';
                echo '            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '            <center> Solicitud guardada correctamente </center>';
                echo '        </div>				';
                echo '       <font color="gray">Una vez enviado esté mensaje, se podrán visualizar los datos de la solicitud agregada en el sistema web.</font></div>';
				echo '      </div>';
				echo '    </div>';
				
				
				echo '    <div class="panel panel-default">';
				echo '      <div class="panel-heading">';
				echo '        <h4 class="panel-title">';
				echo '          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><b>Búsqueda solicitud</b></a>';
				echo '        </h4>';
				echo '      </div>';
				echo '      <div id="collapse3" class="panel-collapse collapse">';
				echo '        <div class="panel-body">Pasos para la realización de una búsqueda ';
				echo '        <b>Paso 1.-</b> Ir a la pestaña <button class="button button1">Solicitudes</button><br><br><br>';
				echo '        <b>Paso 2.-</b> Posicionar el mouse en la caja de búsqueda <input type="text" placeholder="BUSCAR..."><br><br>';
				echo '        <b>Paso 3.-</b> Posicionar el mouse a mano derecha y seleccionar el tipo de búsqueda'; 
                echo '      <select>';
				echo '          <option value="folio">Folio</option>';
                echo '          <option value="empresa">Empresa</option>';                       
                echo '          <option value="prestamo">Tipo de servicio</option>';
                echo '          <option value="division">División</option>';
                echo '          <option value="status">Situación</option>';
				echo '			</select>
				(Folio, Empresa, Tipo de servicio, División, Situación)<br><br>';
				echo '        <b>Paso 4.-</b> Introducir el dato a buscar <br><br>Si el dato que se introdujo en la caja de búsqueda es correcto regresara el dato buscado.<br><br>Si el dato que se introdujo en la caja de búsqueda es incorrecto, se mostrará un mensaje de error (De acuerdo al dato de búsqueda).</div>';
				echo '      </div>';
				echo '    </div>';
				
				echo '    <div class="panel panel-default">';
				echo '      <div class="panel-heading">';
				echo '        <h4 class="panel-title">';
				echo '          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><b>Ver solicitud</b></a>';
				echo '        </h4>';
				echo '      </div>';
				echo '      <div id="collapse4" class="panel-collapse collapse">';
				echo '        <div class="panel-body">Pasos para ver la información del Solicitud:<br>';
				echo '        <b>Paso 1.-</b>Ir a la pestaña <button class="button button1">Solicitudes</button><br><br>';
				echo '        <b>Paso 2.-</b>Dar clic en el icono ver ';
				echo '        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" style="color:#2A9AFE" data-target="#error_logueo">';
                echo '            <i class="fa fa-search" aria-hidden="true"></i>';
                echo '        </button>';
				echo '   <br><br>Se desplegará una ventana donde se podrán visualizar los datos completos de la solicitud agregada.</div>';
				echo '      </div>';
				echo '    </div>';
				
				echo '    <div class="panel panel-default">';
				echo '      <div class="panel-heading">';
				echo '        <h4 class="panel-title">';
				echo '          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><b>Editar solicitud</b></a>';
				echo '        </h4>';
				echo '      </div>';
				echo '      <div id="collapse5" class="panel-collapse collapse">';
				echo '        <div class="panel-body">Pasos para editar una <b> Solicitud </b>:<br>';
				echo '        <b>Paso 1.-</b> Ir a la pestaña <button class="button button1">Solicitudes</button><br><br>';
				echo '        Posiciona el mouse en la fila que se desea Editar (Al deslizar el mouse en  el formulario solicitud aparecerá una selector color gris)<br><br>';
				echo '        <b>Paso 2.-</b> Dar clic en el icono <b>Editar</b> ';
			    echo            '<i class="fa fa-pencil-square-o fa-1x" aria-hidden="true" style="color:#2E9AFE;"></i><br><br>';			
				echo '        <b>Paso 3.-</b> Aparcerá el formulario </b><b>ACTUALIZAR SOLICITUD</b>, modifica el dato que deseas actualizar<br><br>';
				echo '        <b>Paso 4.-</b> Dar clic en el botón <button type="button" class="btn btn-success">Actualizar</button> (Si es que se desea actualizar) ó bien  en el botón <button type="button" class="btn btn-default">Cancelar </button>(Si es que no se desean guardar los datos).<br><br>';
				echo '        <font color="gray">Si los datos ingresados fueron correctos</font>, aparecerá el siguiente mensaje: <br><br>';
				echo '		  <div class="alert alert-success alert-dismissible">';
                echo '          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '            <center>Datos editados correctamente</center>';
                echo '        </div>';
				echo '     Una vez enviada la actualización, se podrán visualizar los datos actualizados de la solicitud en el sistema web.</div>';
				echo '      </div>';
				echo '    </div>';
				
				echo '    <div class="panel panel-default">';
				echo '      <div class="panel-heading">';
				echo '        <h4 class="panel-title">';
				echo '          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><b>Eliminar solicitud</b></a>';
				echo '        </h4>';
				echo '      </div>';
				echo '      <div id="collapse6" class="panel-collapse collapse">';
				echo '        <div class="panel-body">Pasos para eliminar una <b>Solicitud</b>:<br>';
				echo '        <b>Paso 1.-</b> Ir a la pestaña <button class="button button1">Solicitudes</button><br><br>';
				echo '        Posiciona el mouse en la fila que se desea Eliminar (Al deslizar el mouse en  el formulario solicitud aparecerá una selector color gris)<br><br>';
				echo '        <b>Paso 2.-</b> Dar clic en el icono <b>Eliminar</b>';
                echo '        <button type="button" class="btn btn-default btn-xs" data-toggle="modal"  style="color:#2E9AFE;" data-target='.'"'."#"."eliminar_empresa".$idempresa.'" '.'>';
		        echo '           <i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#2E9AFE;"></i><br>';
				echo '        </button>';
				echo '        <br><br><b>Paso 3.-</b> Aparcerá el formulario </b><b>ELIMINAR SOLICITUD</b> con el siguiente mensaje: <b>¿Está seguro de eliminar esta solicitud?</b>,<font color="blue"> Una vez eliminada no se podrá recuperar.</font><br><br>';
				echo '        <b>Paso 4.-</b> Dar clic en el botón <button type="button" class="btn btn-success">Eliminar</button> (Si es que se desea eliminar) ó bien  en el botón <button type="button" class="btn btn-default">Cancelar</button> (Si es que no se desea eliminar la solicitud).<br><br>';
				echo '        <font color="gray">Si se acepto la eliminación del Solicitud</font>, aparecerá el siguiente mensaje:<br><br>';
                echo '        <div class="alert alert-success alert-dismissible">';
                echo '           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '             <center>Solicitud eliminada correctamente<center>';
                echo '        </div>';
		        echo '        Una vez eliminada esta solicitud, no existirá registro de ella.</div>';
				echo '      </div>';
				echo '    </div>';
				echo '  </div> ';
				echo '<br>';
						
				echo '  </div> ';
				echo '</div>';										
          		?>
            </div>  	
      </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>