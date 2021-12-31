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
                if($_SESSION['logueo']=='t'){
                    //menu por tipo de usuario
                    if($_SESSION["tipo"]=="1"){ //menu administrador
					echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="#">';
							echo '<b> Bienvenido, </b>';
							echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"]);
                                                        echo '<b>&nbsp;&nbsp;ADMIN</b>';
                                                //echo '<li><a href="../queries/cerrar_sesion.php"><button type="button" class="btn btn-primary active"><font color=white><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</font></a></button></li>'; 
                                        echo '<li><a href="../queries/cerrar_sesion.php"><button type="button" class="btn btn-primary active"><font color=white><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</font></a></button><br>'; 
                                        echo '<br>';
                                        echo'</ul>';
					echo '<ul class="nav navbar-nav">';
                                    echo '<li><a href="../superuser/usuario_responsable.php">Usuarios</a></li>';
									echo '<li><a href="../superuser/alumnos_administrador.php">Alumnos</a></li>';
								        echo '<li><a href="../superuser/historial_alumno.php">Seguimiento Académico</a></li>';
									echo '<li><a href="../superuser/empresas_administrador.php">Empresas</a></li>';
									echo '<li><a href="../superuser/responsable_administrador.php">Departamentos</a></li>';
                                                                        echo '<li><a href="../superuser/solicitudes_administrador.php">Solicitudes</a></li>';
                                                   
                                    echo'<li class="dropdown">';
                                        echo'<a href="../superuser/division_administrador.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carga Academica<span class="caret"></span></a>';
                                             echo'<ul class="dropdown-menu">';
											        echo'<li><a href="../superuser/materia_administrador.php">Materias</a></li>';
													echo'<li><a href="../superuser/especialidad_administrador.php">Especialidad</a></li>';
													echo'<li><a href="../superuser/especialidad_materia.php">Especialidad_materia</a></li>';
                                                    echo'<li><a href="../superuser/division_administrador.php">Carrera</a></li>';
                                             echo'</ul>';
                                      echo'</li>';
                                    echo '<li><a href="../superuser/ayuda.php"> Ayuda General <i class="fa fa-question-circle" aria-hidden="true"></i></a></li>';
                         
                                    echo'<li class="dropdown">';
                                        echo'<a href="../superuser/division_administrador.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficas<span class="caret"></span></a>';
                                             echo'<ul class="dropdown-menu">';
											        echo'<li><a href="../superuser/graficas.php">graficas por sexo</a></li>';
													echo'<li><a href="../superuser/graficas2.php">graficas servicio</a></li>';
													echo'<li><a href="../superuser/graficas3.php">graficas residencia prof.</a></li>';
													echo'<li><a href="../superuser/graficas4.php">graficas proyecto dúal</a></li>';
											        echo'<li><a href="../superuser/graficas5.php">Solicitud status</a></li>';
                                             echo'</ul>';
                                     echo'</li>';						 
                                    										
                            echo'</ul>';
                    }
                     if($_SESSION["tipo"]=="2"){ //menu alumno
					    echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="#">';
							echo '<b> Bienvenido, </b>';
							echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"])." ".utf8_encode($_SESSION["ap_materno"]);
						        echo '<b>&nbsp;&nbsp;ALUMNO TESJO</b>';
                                                        echo '<li><a href="../queries/cerrar_sesion.php"><button type="button" class="btn btn-primary active"><font color=white><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</font></a></button><br>';                                            
                                                        echo '<br>';
                        echo'</ul>';
                        echo '<ul class="nav navbar-nav">';
                          echo '<li><a href="../students/solicitud_alumno.php">Actualizar (Mis datos personales)</a></li>';
                         // echo '<li><a href="../students/solicitudes_alumnos.php">Ver solicitudes</a></li>';
                        echo '</ul>';
                    } 

                       if($_SESSION["tipo"]=="3"){ //menu empresa(Encargado de la empresa)
					    echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="#">';
							echo '<b>Bienvenido, </b>';
							echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"]);
						         echo '<b>&nbsp;&nbsp;Responsable Empresa</b>';
                                               echo '<li><a href="../queries/cerrar_sesion.php"><button type="button" class="btn btn-primary active"><font color=white><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</font></a></button><br>'; 
                                               echo '<br>';
                        echo'</ul>';
                        echo '<ul class="nav navbar-nav">';
						  //echo '<li><a href="../superuser/datos_responsable.php">Datos responsable</a></li>';
						  echo '<li><a href="../superuser/personal_empresa.php">Agregar personal</a></li>';
						  echo '<li><a href="../superuser/departamento_empresa.php">Asignar Departamento</a></li>';
                          echo '<li><a href="../business/solicitud_empresa.php">Solicitudes</a></li>';
						  echo '<li><a href="../superuser/ayuda_empresa.php"> Ayuda <i class="fa fa-question-circle" aria-hidden="true"></i></a></li>';
                        echo '</ul>';
                       }
                        if($_SESSION["tipo"]=="4"){ //menu empresa(personal empresa)
					    echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="#">';
							echo '<b> Bienvenido, </b>';
							echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"]);
							echo '<b>&nbsp;&nbsp;Personal Empresa</b>';
						echo '<li><a href="../queries/cerrar_sesion.php"><button type="button" class="btn btn-primary active"><font color=white><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</font></a></button><br>'; 
                                                
echo '<br>';
echo '</ul>';
                        echo '<ul class="nav navbar-nav">';
						  echo '<li><a href="../superuser/datos_personal.php">Datos del personal</a></li>';
                          echo '<li><a href="../business/solicitud_empresa.php">Solicitudes</a></li>';
						  echo '<li><a href="../superuser/ayuda_personal.php"> Ayuda <i class="fa fa-question-circle" aria-hidden="true"></i></a></li>';
                        echo '</ul>';
                       }					   
                       if($_SESSION["tipo"]=="5"){ //menu jefe de division
					    echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="#">';
							echo '<b> Bienvenido, </b>';
							echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"]);
						        echo '<b> Jefe de Divisi&oacute;n</b>';
                                                echo '<li><a href="../queries/cerrar_sesion.php"><button type="button" class="btn btn-primary active"><font color=white><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</font></a></button><br>'; 
                                                echo '<br>';
                        echo'</ul>';
                          echo '<ul class="nav navbar-nav">';
									echo '<li><a href="../superuser/alumnos_administrador.php">Alumnos</a></li>';
									echo '<li><a href="../superuser/historial_alumno.php">Seguimiento Académico</a></li>';
									echo '<li><a href="../superuser/empresas_administrador.php">Empresas</a></li>';
									echo '<li><a href="../superuser/responsable_administrador.php">Departamentos</a></li>';
                                    echo '<li><a href="../superuser/solicitudes_administrador.php">Solicitudes</a></li>';
                                                 
                                     echo'<li class="dropdown">';
                                        echo'<a href="../superuser/division_administrador.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carga Academica<span class="caret"></span></a>';
                                             echo'<ul class="dropdown-menu">';
											        echo'<li><a href="../superuser/materia_administrador.php">Materias</a></li>';
													echo'<li><a href="../superuser/especialidad_administrador.php">Especialidad</a></li>';
													echo'<li><a href="../superuser/especialidad_materia.php">Especialidad_materia</a></li>';
                                                    echo'<li><a href="../superuser/division_administrador.php">Carrera</a></li>';
                                             echo'</ul>';
                                      echo'</li>';
                                   echo '<li><a href="../superuser/ayuda_jefe.php"> Ayuda <i class="fa fa-question-circle" aria-hidden="true"></i></a></li>'; 
                            echo'</ul>';
                    }
                    if($_SESSION["tipo"]=="6"){ //menu jefe de departamento
					    echo '<ul class="nav navbar-nav navbar-right">';
						echo '<li><a href="#">';
							echo '<b> Bienvenido, </b>';
							echo utf8_encode($_SESSION["nombre"])." ".utf8_encode($_SESSION["ap_paterno"]);
                                                        echo '<b>&nbsp;&nbsp;Jefe de Departamento</b>';
						echo '<li><a href="../queries/cerrar_sesion.php"><button type="button" class="btn btn-primary active"><font color=white><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</font></a></button><br>'; 
                                                
echo '<br>';
 
                        echo'</ul>';
                          echo '<ul class="nav navbar-nav">';
									echo '<li><a href="../superuser/alumnos_administrador.php">Alumnos</a></li>';
									echo '<li><a href="../superuser/empresas_administrador.php">Empresas</a></li>';
									echo '<li><a href="../superuser/responsable_administrador.php">Departamentos</a></li>';
                                    echo '<li><a href="../superuser/solicitudes_administrador.php">Solicitudes</a></li>';
                                                 
                                     echo'<li class="dropdown">';
                                        echo'<a href="../superuser/division_administrador.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carga Academica<span class="caret"></span></a>';
                                             echo'<ul class="dropdown-menu">';
											        echo'<li><a href="../superuser/materia_administrador.php">Materias</a></li>';
													echo'<li><a href="../superuser/especialidad_administrador.php">Especialidad</a></li>';
													echo'<li><a href="../superuser/especialidad_materia.php">Especialidad_materia</a></li>';
                                                    echo'<li><a href="../superuser/division_administrador.php">Carrera</a></li>';
                                             echo'</ul>';
                                      echo'</li>';
                                   echo '<li><a href="../superuser/ayuda_jefe.php"> Ayuda <i class="fa fa-question-circle" aria-hidden="true"></i></a></li>'; 
                            echo'</ul>';
                    }					
                    
                }
                if($_SESSION['logueo']=='f'){
                    echo '<ul class="nav navbar-nav">';
                      echo '<li><a href="index.php"><i class="fa fa-home fa-1x" aria-hidden="true"></i></a></li>';
                    echo '</ul>';    
                }
              }
             else{ ///visitante 
                echo '<ul class="nav navbar-nav">';
                  echo '<li><a href="../index.php"><i class="fa fa-home fa-1x" aria-hidden="true"></i></a></li>';
                echo '</ul>';
             } 
      ?>
    </div>
  </div>
</nav>          
