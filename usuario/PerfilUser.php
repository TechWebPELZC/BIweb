<?php
	require '../PHP/conn.php';
	session_start();
	$usuario = $_SESSION['usuario']['Us_User'];
     $id_user = $_SESSION['usuario']['ID_User'];
	$sql2 = "SELECT * FROM b_users WHERE Us_User = '$usuario'";
	$result = $conn->query($sql2);

          if (!isset($_SESSION['usuario'])) {
               header('Location: ../Ingresar.php');
          }else {
               if ($_SESSION['usuario']['TipoUsuario'] != "Usuario") {
               header('Location: ../Ingresar.php');
          }
     }
     $sql3 = "SELECT t.ID_Top, l.ID_Libro, l.Portada, l.Titulo_Libro,CONCAT( a.Nom_Autor, ' ', a.AP_Autor, ' ', a.AM_Autor) As Autor, t.fecha_hora, l.Link_book from b_topvistas as t 
      inner join b_book as l on  l.ID_Libro = t.ID_Libro
      inner join b_users as u on u.ID_User = t.ID_User
      inner join bk_autorbook ON l.ID_Libro = bk_autorbook.ID_Libro 
      INNER JOIN b_autor AS a ON bk_autorbook.ID_Autor = a.ID_Autor
      WHERE t.ID_User = '".$id_user."' order by t.fecha_hora desc limit 5";
    $result2 = $conn->query($sql3);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Mi Perfil</title>
		<link rel="stylesheet" type="text/css" href="../CSS/fonts.css">
    <link rel="shortcut icon" href="../assets/icons/book.ico" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

            <link rel="stylesheet" type="text/css" href="../CSS/nuevo-menu.css">
    <link rel="stylesheet" href="../CSS/main.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/nuevo-menu.js"></script>

    <link rel="manifest" href="./../manifest.json">

	</head>
	<body>
		<!-- Cabecera -->
		 <header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-menu3"></span>Menú</a>
    </div>
    <center>
      <nav>
      <ul>
          <table>
            <tr>
              <img src="../Imagenes/Logo.png" width = "20%" height="20%">
            </tr>
            <tr>
              <br>
              <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>  
            </tr>
          </table>
        <li><a href="InicioU.php"><span class="icon-home3"></span>Inicio</a></li>
        <li><a href="Biblioteca.php"><span class="icon-books"></span>Biblioteca</a></li>
        <li><a href="historial.php"><span><img src="../Imagenes/historia.png"></span> Historial de libros</a></a></li>
        <li class="submenu">
          <a href="#"><span class="icon-user"></span>Perfil<span class="caret icon-keyboard_arrow_down"></span></a>
          <ul class="children">
            <li><a href="PerfilUser.php">Mi Perfil <span class="icon-profile"></span></a></li>
            <li><a href="../PHP/cierre.php">Cerrar sesión <span><img src="../Imagenes/cerrar-sesion.png" width="20" height="20"></span></a></li>
          </ul>
        </li>
        
      </ul>
    </nav>
    </center> 
  </header>
          <!-- Contenido -->
          <section class="contenido">
              <br>
               <h1><i><p><center>Bienvenido(a) a tu perfil <?php echo $_SESSION['usuario']['Nom_User']; ?></center></p></i></h1>
               <br>
               <center><img src="../assets/img/user01.png" width="20%" height="20%"></center>
               <br>
               <?php
               		if (mysqli_num_rows($result) > 0) { 
               			while ($datos = mysqli_fetch_array($result)){ 
               ?>

               <section>
                    <center><h2> Información de usuario </h2></center>
                    <br>
                    <center><table align="center" border="3">
                    <tr>
               		<th width="350" height="20"><center><font face="Times New Roman" size="4"> Nombre de usuario </font></center></th>
               	</tr>
               		<th width="120" height="60"><center><font face="Montserrat Medium" color="#22130160"><i> <?php echo $datos['Us_User']?></i></font></center></th>
                    </tr>

               	<tr>
                         <th width="120" height="20"><center><font face="Times New Roman" size="4"> Nombre completo </font></center></th>
                    </tr>
               	<tr>
               		<th width="120" height="60"><center><font face="Montserrat Medium" color="#22130160"><i> <?php  echo $datos['Nom_User'].' '.$datos['AP_User'].' '.$datos['AM_User']?> </i></font></center></th>
               	</tr>
                    <tr>
               	    <th width="120" height="20"><center><font face="Times New Roman" size="4"> Correo electronico </font></center></th>
               	</tr>
                    <tr>
               		<th width="120" height="60"><center><font face="Montserrat Medium" color="#22130160"><i> <?php echo $datos['Email']?> </i></font></center></th>
               	</tr>
                    <tr>
                         <th width="120" height="20"><center><font face="Times New Roman" size="4"> Fecha de nacimiento </font></center></th>
               	</tr>
               	<tr>
               		<th width="120" height="60"><center><font face="Montserrat Medium" color="#22130160" size="4"><i> <?php 
                              $fecha_bd= $datos['F_nacimiento'];
                              $fecha_format = date('d/m/Y', strtotime($fecha_bd));
                              echo $fecha_format;
                         ?> </i></font></center></th>
               	</tr>
               	<tr>
                         <th width="120" height="20"><center><font face="Times New Roman" size="4"> Actividad </font></center></th>
               	</tr>
               	<tr>
               		<th width="120" height="60"><center><font face="Montserrat Medium" color="#22130160"><i> <?php echo $datos['Actividad']?> </i></font></center></th>
               	</tr>
               	<tr>
               		<th width="120" height="20"><center><font face="Times New Roman" size="4"> Genero </font></center></th>
                    <tr>
                         <?php  
                              if($datos['Sexo']=="M"){
                         ?>
               		<th width="120" height="60"><center><font face="Montserrat Medium" color="#22130160"><i> Masculino </i></font></center></th>
                         <?php 
                              } elseif ($datos['Sexo']=="F") {
                         ?>
                         <th width="120" height="60"><center><font face="Montserrat Medium" color="#22130160"><i> Femenino </i></font></center></th>
                         <?php  
                              }
                         ?>
               	</tr>

               	<?php 
					} 
						mysqli_free_result($result); 
					}
				?>
                    </table></center> 
                    <br>
                    <br>
               <section>
               <center><table>
                    <tr>
                         <th><a class="boton_personalizado" href="../PHP/editarperfil.php?id=<?php echo $_SESSION['usuario']['ID_User'];?>">Editar información</a></th>
                         <th><a class="boton_personalizado" href="../PHP/editarcontraseña.php?idc=<?php echo $_SESSION['usuario']['ID_User'];?>">Cambiar contraseña</a></th>
                    </tr>
               </table></center>

            </section>
            <br>
                    <br>
          </section>
          <script src="./../script.js"></script>
            <footer>
                    <center>Bi Web</center>
                    Pagina oficial: <a href="https://jova0411.wixsite.com/techwebpelzc">TechWeb</a>
                    Redes sociales: 
                    <a href="https://www.facebook.com/TechWebPELZC/" target="_blank" title="Facebook"><img src="../Imagenes/facebook.wix_mp"></a>
                    <a href="https://www.instagram.com/techweblzc/?hl=es-la" target="_blank" title="Instagram"><img src="../Imagenes/Instagram.webp"></a>
                    <a href="https://twitter.com/TechWebPE_LZC" target="_blank" title="Twitter"><img src="../Imagenes/twitter.webp"></a>
                    <a href="https://www.youtube.com/channel/UClhQx2c6LSgtT5f87jC2vxg" target="_blank" title="Youtube"><img src="../Imagenes/youtube.webp"></a>
           </footer>

	</body>
	</html>