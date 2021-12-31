<!--Método para invocar la sesion de un usuario antes de manipularlo-->
<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuario</title>
	<!--<link rel="stylesheet" type="text/css" href="../css/estilos_agregar.css">-->
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
	  
	 <form>
         <?php 
         include ('../graficas/graficas2.php');
         ?>
	 <form>
	 
   
	  
		 
    
      	  

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>