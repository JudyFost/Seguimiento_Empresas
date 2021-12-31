<?php
session_start();
unset($_SESSION["idusuario"]);
unset($_SESSION["ap_paterno"]);
unset($_SESSION["ap_materno"]);
unset($_SESSION["nombre"]);
unset($_SESSION["tipo"]);
unset($_SESSION["logueo"]);

session_destroy();
header("Location: ../index.php");
?>