<?php
//Código para incluir el archivo de conexion
include("../include/conexion.php");
// Aquí empieza el código pertenece solicitud del administrador
//Buscar departamento
if(isset($_POST['txtempresa'])){
$idempresa=$_POST['txtempresa'];
$sqlresponsable=mysql_query("SELECT * FROM responsable_empresa  WHERE idempresa=$idempresa;");
echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
    while($rowresponsable = mysql_fetch_array($sqlresponsable))
         {
          echo'<OPTION VALUE="'.$rowresponsable['iddepartamento'].'">'.utf8_encode($rowresponsable['nombre_departamento']).'</OPTION>';
          }
}
//Aquí termina código

//Buscar responsable departamento
if(isset($_POST['txtresponsable'])){
$idresponsable=$_POST['txtresponsable'];
$sqldepartamento=mysql_query("SELECT * FROM responsable_empresa WHERE iddepartamento=$idresponsable");
echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
    while($rowdepartamento = mysql_fetch_array($sqldepartamento))
       {
         echo'<OPTION VALUE="'.$rowdepartamento['idusuario'].'">'.utf8_encode($rowdepartamento['nombre'])." ".utf8_encode($rowdepartamento['ap'])." ".utf8_encode($rowdepartamento['am']).'</OPTION>';
        }
}
//Aquí termina código

//Buscar sector y giro_comercial (Empresa)
if(isset($_POST['txtsector'])){
$idsector=$_POST['txtsector'];
$sqlres=mysql_query("SELECT * FROM giro_comercial  WHERE tipo_sector_idsector=$idsector;");
echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
    while($rowres = mysql_fetch_array($sqlres))
         {
          echo'<OPTION VALUE="'.$rowres['idgiro'].'">'.utf8_encode($rowres['nombre']).'</OPTION>';
          }

}
//Aquí termina código


//Buscar division nueva solictud
if(isset($_POST['txtdivision'])){
$iddivision=$_POST['txtdivision'];
$nombre_especialidad;
$sqlespecialidad=mysql_query("SELECT * FROM division_especialidad WHERE iddivision='$iddivision';");
    //sacando nombre de la division
    while($rowespecialidad = mysql_fetch_array($sqlespecialidad))
         {
         $nombre_especialidad=$rowespecialidad['nombre_carrera'];
         }
$sqlespecialidad=mysql_query("SELECT * FROM division_especialidad WHERE nombre_carrera='$nombre_especialidad';");      
echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
    while($rowespecialidad = mysql_fetch_array($sqlespecialidad))
         {
         echo'<OPTION VALUE="'.$rowespecialidad['idespecialidad'].'">'.$rowespecialidad['nombre'].' - '.$rowespecialidad['descripcion'].'</OPTION>';
         }
}
//Aquí termina código

//Buscar division respecto a especialidad para actualizar
if(isset($_POST['txtdivision_actualizar'])){
$iddivision=$_POST['txtdivision_actualizar'];
$nombre_especialidad;
$sqlespecialidad=mysql_query("SELECT * FROM division_especialidad WHERE iddivision='$iddivision';");
    while($rowespecialidad = mysql_fetch_array($sqlespecialidad))
         {
         $nombre_especialidad=$rowespecialidad['nombre_carrera'];
         }
$sqlespecialidad=mysql_query("SELECT * FROM division_especialidad WHERE nombre_carrera='$nombre_especialidad';"); 
echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
     while($rowespecialidad = mysql_fetch_array($sqlespecialidad))
        {
         echo'<OPTION VALUE="'.$rowespecialidad['idespecialidad'].'">'.$rowespecialidad['nombre'].' '.$rowespecialidad['descripcion'].'</OPTION>';
        }
}
//Aquí termina código

//Código para editar sector y giro_comercial del formulario (Empresa)
if(isset($_POST['txtsector_actualizar'])){
$idsector=$_POST['txtsector_actualizar'];
$sqlre=mysql_query("SELECT * FROM giro_comercial  WHERE tipo_sector_idsector=$idsector;");
echo'<OPTION VALUE="">'.'- Selecciona -'.'</OPTION>';
    while($rowre = mysql_fetch_array($sqlre))
         {
          echo'<OPTION VALUE="'.$rowre['idgiro'].'">'.utf8_encode($rowre['nombre']).'</OPTION>';
          }
}
//Aquí termina código
?> 
