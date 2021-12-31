<?php
// session_start();
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="../images/tesjo.png"  class="img-rounded navbar-brand"/><a class="navbar-brand" href="#">TESJo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php
          if(isset($_SESSION['logueo'])){
          //  session_start();
                if($_SESSION['logueo']=='t'){
                      //menu por tipo de usuario
                    if($_SESSION["tipo"]=="1"){ //menu administrador
                        echo '<ul class="nav navbar-nav">';
                          echo '<li><a href="administrador.php"><i class="fa fa-home fa-1x" aria-hidden="true"></i></a></li>';     
                        echo'</ul>';
                    }
                     if($_SESSION["tipo"]=="2"){ //menu alumno
                        echo '<ul class="nav navbar-nav">';
                          echo '<li><a href="../students/alumnos.php"><i class="fa fa-home fa-1x" aria-hidden="true"></i></a></li>';
                          echo '<li><a href="../students/solicitudes_alumnos.php">Solicitudes</a></li>';
                        echo '</ul>';
                    } 

                       if($_SESSION["tipo"]=="3"){ //menu empresa
                        echo '<ul class="nav navbar-nav">';
                          echo '<li><a href="../business/solicitud_empresa.php">Solicitudes</a></li>';
                        echo '</ul>';
                    }  
                    
                }
                if($_SESSION['logueo']=='f'){
                    echo '<ul class="nav navbar-nav">';
                      echo '<li><a href="../index.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a></li>';
                    echo '</ul>';    
                }
              }
             else{ ///visitante 
                echo '<ul class="nav navbar-nav">';
                  echo '<li><a href="../index.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a></li>';
                echo '</ul>';
             } 
      ?>
	  
	  <ul class="nav navbar-nav navbar-right">
            <?php
              if(isset($_SESSION['logueo'])){
                if($_SESSION['logueo']=='t'){
                    echo '<li><a href="#">';
					echo '<b> BIENVENIDO: </b>';
                    echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"])." ".utf8_encode($_SESSION["ap_materno"]);
					echo '<li><a href="../queries/cerrar_sesion.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</a><li>'; 

                }
                if($_SESSION['logueo']=='f'){
                    echo '<li><a href="../forms/form_login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>';
                }
              }
             else{
                echo '<li><a href="../forms/form_login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>';
             } 
            ?> 
      </ul>

      <!--<ul class="nav navbar-nav navbar-right">
            <?php
             /* if(isset($_SESSION['logueo'])){
                if($_SESSION['logueo']=='t'){
                    echo '<li><a href="#">';
                    echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"])." ".utf8_encode($_SESSION["ap_materno"]);
                    echo '<li><a href="../queries/cerrar_sesion.php"><button type="buton" class="btn btn-danger btn-xs">Cerrar sesion</button></a><li>'; 
                }
                if($_SESSION['logueo']=='f'){
                    //echo '<li><a href="../forms/form_login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>';
                }
              }
             else{
              //  echo '<li><a href="../forms/form_login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>';
             }*/ 
            ?> 
      </ul>-->
    </div>
  </div>
</nav>          
