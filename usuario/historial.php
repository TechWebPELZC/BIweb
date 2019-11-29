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
		<title>Historial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
          <a href="#"><span class="icon-user"></span>Perfil<span class="caret"></span></a>
          <ul class="children">
            <li align="left"><a href="PerfilUser.php">Mi Perfil<span class="icon-profile"></span></a></li>
            <li align="left"><a href="../PHP/cierre.php">Cerrar sesión<span><img src="../Imagenes/cerrar-sesion.png" width="20" height="20"></span></a></li>
          </ul>
        </li>
        
      </ul>
    </nav>
    </center> 
  </header>

          <!-- Contenido -->
          <section class="contenido">

               <h1><i><center>Bienvenido(a) a tu historial <?php echo $_SESSION['usuario']['Nom_User']; ?></center></i></h1>
                    </table></center> 
               		<center><h2><p>Historial de Libros</p></h2></center>
                          <center><table width="70%" align="center" id="central" class="table-responsive" border="1">
                            <thead>
                            <tr>
                              <th></th>
                              <th><center>Portada</center></th>
                              <th><center>Libro</center></th>
                              <th><center>Autor</center></th>
                              <th><center>Fecha visto</center></th>
                              <th><center>Enlace</center></th>
                            </tr> 
                          </thead>
                          <tbody>
                     <?php
                      if($result2->num_rows > 0){
                        while ($row = $result2->fetch_assoc()) {
                     ?>
                     <tr>
                         <td><?php
                         echo "<td width = '15%' height='165'><center>"; echo "<img src='../".$row['Portada']."' width = '100' height='150'>"; echo "</td></center>";?></td>
                          <td width="20%" height="165" align="center"><a href="../Bibliografia/bibliografia.php?id=<?php echo $datos2['ID_Libro'];?>"><?php echo $row['Titulo_Libro']; ?></a></td>
                         <td height="165"><center><?php echo $row['Autor']?></center></td>
                         <td height="165"><center><?php echo $row['fecha_hora']?></center></td>
                         <td height="60"><center><a href="../PHP/TopVer.php?id=<?php echo $row['ID_Libro'];?>&link=<?php echo $row['Link_book'];?>" target="_blank"><button class="boton_personalizado">Leer libro</button></a></center></td>
                         </tr>
                         </tbody>
                     <?php
              }
            }
            else
            {
              ?>
              <tr>
                <th colspan="2">No se encuentran datos</th>
                </tr>
                <?php
            }
            ?>
            </table>
                  </center>
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