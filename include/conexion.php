<?php 
error_reporting(E_ALL ^ E_DEPRECATED); //omitir error de mysql viejo al nuevo msqli;
if (!mysql_connect("localhost","root","josediaz"))
      { 
      echo "Error al conectar al servidor."; 
      exit(); 
   } 
if (!mysql_select_db("seguimiento_empresas"))
      { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
?> 
