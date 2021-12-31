<?php 
session_start();
  if(isset($_SESSION["tipo"])){
      if($_SESSION["tipo"]=='1'){//tipo de sision para alumnos
              header("Location: superuser/usuario_responsable.php"); 
          }
       if($_SESSION["tipo"]=='2'){
          header("Location: superuser/alumnos_administrador.php"); 
      }    
  }  
?>
<!DOCTYPE HTML>
<!--
	Editorial by Judith
	Free for personal and commercial use under the CCA 3.0 license 
-->
<html>
	<head>
		<title>Agenda Empresarial</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome_act.css">
		<style>
			img {
			max-width: 100%;
			height: auto;
			width: auto/9; /* Bug de ie8 
			  background-attachment: fixed;
			}	
		</style>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
								   <div style="position:absolute; top:60px; left:0px; visibility:visible z-index:1">  
									 <img src="images/tesjo.png" width="130">									 
                                   </div>								
								   <div style="position:absolute; top:76px; left:1080px; visibility:visible z-index:1"> 
                                     <img src="images/lobo_tesjo.png" width="100"> 
                                   </div>								   
									<strong><h4 align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Servicio Social y Residencia Profesional <i class="fa fa-book fa-2x" aria-hidden="true"></i></h4></strong>
									<ul class="icons">
										<li><a href="https://twitter.com/hashtag/tesjo?lang=es" target="_target" class="icon fa-twitter fa-1x"><span class="label">Twitter</span></a></li>
										<li><a href="https://www.facebook.com/Tesjocotitlan" target="_target" class="icon fa-facebook fa-1x"><span class="label">Facebook</span></a></li>
										<li><a href="https://medium.com/" target="_target"class="icon fa-medium fa-1x"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
										    <div style="position:justify; top:-50; left:5; color:black; font-size:30px; z-index:1"><font size=><b>Bienvenido(a)</b></font></div>
										</header>
									        <center><img src="images/pic02.jpg" alt="" /></center>
											<br>
											Escribenos para cualquier duda o sugerencia:<font size=4><center><i class="fa fa-envelope-o" aria-hidden="true"><a href="mailto: difusion@tesjo.edu.mx"> difusion@tesjo.edu.mx</a></i></center></font>
					                       <br>
										   <center><i class="fa fa-angle-down fa-2x" aria-hidden="true"> <font color="gray" size="3">Más información  en la parte de abajo</font></i></center>					
										</p>
									</div>
									<span class="image object">
										<img src="images/pic10.jpg" width="400" />
									</span>
								</section>									
							<!-- Section -->
							
								<section>
									<header class="major">
										<h2>PASOS PARA LLEGAR AL ÉXITO</h2>
									</header>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
											<center><h3>Paso 1. Servicio Social</h3></center>
											<center><h3><b>¿Sabías que?</b></h3></center>
											  <ul style="list-style-type: disc" class="text-justify">
												  <li>Tiene un valor curricular de 10 créditos.</li>
												  <li>No se puede dar de baja, ni cambiar de lugar.</li>
												  <li>Tienes que estar reinscrito al iniciar y al concluir.</li>
												  <li>No se autorizará la Residencia Profesional a ningún alumno que no haya acreditado el Servicio Social.</li>
											  
											  <br>
											          <center><b>Para más información, da clic aquí</b></center>
													  <br>
												  <center><i class="fa fa-hand-o-down fa-2x" aria-hidden="true"></i></center>
                                                <ul class="actions">
												
												    <center><li><a text-align href="pdfs/folletoservicio.pdf" target="_blank" class="button"> More</a></li></center>
											    </ul>											 
											  </ul>							              
											</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
											<center><h3>Paso 2. Residencia Profesional</h3></center>
											<center><h3><b>¿Sabías que?</b></h3></center>
											  <ul style="list-style-type: disc" class="text-justify">
												<li> La Residencia Profesional es una materia con valor curricular de 10 créditos, que sólo podrás cursar solo una vez, misma que deberás acreditar para egresar.</li>
									 			<li> Tu Proyecto de Residencia Profesional podrá ser utilizado como opción de titulación.</li>
												<br>
											          <center><b>Para más información, da clic aquí</b></center>
												 <center><i class="fa fa-hand-o-down fa-2x" aria-hidden="true"></i></center>
											 <ul class="actions">
												<center><li><a href="pdfs/folletoresidencia.pdf" target="_blank" class="button">More</a></li></center>
											 </ul>
											  </ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
											<center><h2>Paso 3. Portal de Empleo</h2></center>
											<p>
											<li> Esta a tu disposición nuestro portal de empleo  para que subas tu curriculum vitae y puedas consultar los espacios que ofertan las empresas.
											</li>
											</p>
											          <center><b>Para más información, da clic aquí</b></center>
												 <center><i class="fa fa-hand-o-down fa-2x" aria-hidden="true"></i></center>
											<ul class="actions">
												<center><li><a href="http://tesjocotitlan.trabajando.com.mx" target="_blank" class="button">More</a></li></center>
											</ul>
										</article>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							<!-- Menu -->
								<nav id="menu">
									<ul>
										<li></li>
									    <font size=4><a href="index.php" class="fa fa-home fa-2x" aria-hidden="true"> Inicio</a></font>
									    <li></li>
									    <font size=4><a class="fa fa-arrow-circle-down" aria-hidden="true" href="#" style="width: 140px; height: 35px;" class="btn btn-info" data-toggle="collapse" data-target="#mas_informa"> REGISTRO</a></font>
											<!--<div id="mas_informa" class="collapse">colapse cerrado-->
											<div id="mas_informa" class="panel-collapse collapse in">
												<div style="background-image:url(images/fondo_iniciar.jpg)">
													<!--<li>-------------------------------------------</li>-->
														 <br>
														  <ul style="list-style-type: disc" class="text-justify">
															<div id="id_formulario">
															  <center><i class="fa fa-user fa-4x" aria-hidden="true"></i></center>
															  <center><b>Iniciar Sesión</b></center>
															  <form class="form-horizontal" action="include/validalogin.php" method="post">
															  <div class="form-group">
																				<label class="control-label col-sm-4" for="usuario">Usuario:</label>
																				<div class="col-sm-7">                  
																					 <input  type="text" name="usuario" id="usuario" class="form-control input-sm" size="50" maxlength="50" placeholder="usuario" required>
																				</div>
															  </div>
																			  <div class="form-group">
																				<label class="control-label col-sm-4" for="password">&nbsp;Contraseña:</label>
																				<div class="col-sm-7">                  
																					 <input  type="password" name="password" id="password"  class="form-control input-sm" size="50" maxlength="50" placeholder="contraseña" required>
																				</div>
																			  </div>
																			  <br />
																			  <div class="form-group">
																				<div class="col-sm-offset-5 col-sm-7">                 
																					<input type="submit" name="login" value="Entrar" id="boton" class="btn btn-success"> 
																				</div>
																			  </div>
                                                                              <br>																			  
																			 </form>
															   </div>
														  </ul>
					                                </div>
						                        </div>
											 <li></li><!--fin formulario-->
											 <div class="col-sm-12">
												 <?php
													if(isset($_SESSION["logueo"])){
														if($_SESSION["logueo"]=='f'){
															 echo '<br>';
																 echo '<div class="alert alert-danger">';
																	echo '  <a href="index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
																	echo '  <h6 style="text-align:center;"><b>¡ verifica tus datos !</b></h6>';
																	echo '  </div>';
																	    unset($_SESSION["logueo"]);
																			session_destroy();  
														}
													}
												  ?>
									        </div>
											
							<!-- Section -->
								<section>
									<header class="major">
									<br>
									<ul class="contact">
										<li class="fa-phone">(01712) 123-1313</li>
										<li class="fa-home">ubicados en:</li><br>
										<font size=1>Carretera Toluca-Atlacomulco km 44.8, Col. Ejido de San Juan y San Agustín, Jocotitlán, Edo. México. <br>
										</font>
										<br />
									</ul>
									</header>
								</section>

							<!-- Footer -->
								<br>
								<footer id="footer">
								    <font size=2 color="gray" text-transform: none;>
										<p>@
											<script type="text/javascript">
												 var d = new Date();
												 document.write(d.getFullYear());
											</script>
										    Vinculación y Extensión TESJo.</p>
									</font>
								</footer>
						</div>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="js/jquery.js"></script>
            <script src="js/bootstrap.js"></script>
	</body>
</html>