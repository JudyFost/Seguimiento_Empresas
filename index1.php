<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Particulas</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/index_estilo.css">
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<style>
	* {
		box-sizing: border-box;
	}

	.column {
		float: left;
		width: 50%;
		padding: 30px;
	}

	/* Clearfix (clear floats) */
	.row::after {
		content: "";
		clear: both;
		display: table;
	}

	/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 500px) {
		.column {
			width: 100%;
		}
	}
</style>

<body>

	<div id="particles-js"></div>

	<header>
		<div class="menu">
			<div class="contenedor">
				<b><div class="logo">BIENVENIDO</div></b>
				<nav>
					<ul>
						<li><a href="#"><img src="images/teslog.png"></a></li>
					</ul>
				</nav>
			</div>
			<br>
			<br>
			<br>
			<center><P>Da <b>clic</b> en el sitio que deseas ingresar</p></center>
		</div>
	</header>
    <br>

	<div class="principal contenedor">
		<!-- Section -->				
			<section>
				<div class="posts">
					<article>
						<a href="indexar.php" class="image"><img src="images/agenda.jpg" alt="" /></a>
						<center><b><font color="black" size=4>Agenda Empresarial</font></b></center>
					</article>
					<article>
						<a href="indexar.php" class="image"><img src="images/inventario.jpg" alt="" /></a>
						<center><b><font color="black" size=4>Control de Inventario</font></b></center>
					</article>
				</div>
			</section>
			<br>
			<br>
			<br>
			<br>
			<br>
			<footer>
				<div  style="text-align: left; class="contenedor">
					<font size=3 color="gray" text-transform: none;>
						<p>@
							<script type="text/javascript">
								var d = new Date();
								document.write(d.getFullYear());
							</script>
							TESJo.</p>
					</font>
				</div>
			</footer>
	</div>
		
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/particles.js"></script>
	<script src="js/particulas.js"></script>
</body>
</html>