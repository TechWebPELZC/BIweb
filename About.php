<?php
  session_start();
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['usuario']['TipoUsuario'] == "Admin") {
    header('Location: admin/InicioAdmin.php');
  }elseif ($_SESSION['usuario']['TipoUsuario'] == "Usuario") {
    header('Location: usuario/InicioU.php');
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/php charset=utf-8"/>
		<title>Quienes somos</title>
		<link rel="shortcut icon" href="./assets/icons/book.ico" />
		<link rel="stylesheet" type="text/css" href="CSS/fonts.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="CSS/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/estilos2.css">
    <link rel="stylesheet" type="text/css" href="CSS/nuevo-menu.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/nuevo-menu.js"></script>
    <link rel="manifest" href="./manifest.json">
	</head>
	<body>
		<!-- Cabecera -->
     <!-- <header class="header2">
          <div class="wrapper">
          <div class="logo"><img src="Imagenes/Logo.png"></div>
          <table>
            <tr>
              <br>
              <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>
            </tr>
          </table>
          <nav>
            <a href="index.php"><span class="icon-home3"></span> Inicio</a>
            <a href="About.php"><span class="icon-newspaper"></span>Quienes somos</a>
            <a href="Ingresar.php"><span class="icon-enter"></span> Ingresar</a>
            <a href="Registrar.php"><span class="icon-user"></span> Registrar</a>
          </nav>
        </div>
          </header>-->
      <header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-menu3"></span>Menú</a>
    </div>
    <center>
      <nav>
      <ul>
          <table>
            <tr>
              <img src="Imagenes/Logo.png" width = "20%" height="20%">
            </tr>
            <tr>
              <br>
              <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>  
            </tr>
          </table>
        <li><a href="index.php"><span class="icon-home3"></span>Inicio</a></li>
        <li><a href="About.php"><span class="icon-newspaper"></span>Quienes Somos</a></li>
        <li><a href="Ingresar.php"><span class="icon-enter"></span>Ingresar</a></li>
        <li><a href="Registrar.php"><span class="icon-user"></span>Registrar</a></li>
      </ul>
    </nav>
    </center> 
  </header>
  <br>
          <!-- Contenido -->
<div class="contenedor" id="contenedor">
    <section class="tarjeta">

      <section class="slider_info">
        <!-- Flechas del Slider -->
        <a href="#" id="info-prev" class="flecha-info anterior" ><span class="fa fa-chevron-left"></span></a>
        <a href="#" id="info-next" class="flecha-info siguiente"><span class="fa fa-chevron-right"></span></a>

        <section class="informacion" id="informacion">
          <article id="info">
            <div class="slide active">
              <h1 class="nombre">Desarrolladores</h1>
              <p class="trabajo">Escamilla Téllez José Jovany</p>
              <p class="trabajo">Preciado Naranjo Edgar Adrian</p>
              <p class="pais"><img src="Imagenes/bandera.png" alt="">Mexico</p>
            </div>
          
            <div class="slide">
              <h2 class="subtitulo">Objetivo del projecto</h2>
              <p class="texto">Diseñar una aplicación web y móvil que te permita consultar libros digitales con temas relacionados a la carrera de Ing. Sistemas Computacionales del Instituto Tecnológico de Lázaro Cárdenas, Mich., con el fin de brindar un apoyo didáctico a los estudiantes de dicha carrera.</p>
            </div>

            <div class="slide">
              <h2 class="subtitulo">Empresa: TechWeb PE LZC</h2>
              <p class="texto">Los servicios que ofrece nuestra empresa son: 
              <br><br>
              Creacion y Distribución de Aplicaciones móviles y Aplicaciones web
              Venta de Accesorios para Computadora
              Mantenimiento Preventivo y Correctivo a Computadoras y Dispositivos Móviles
              Reparación de Computadoras y Dispositivos Móviles
              Creación de sitios web personalizados en HTML
              Diseño de portadas para libros y logos en formato digital</p>
            </div>
          </article>
          <div class="botones" id="botones"></div>
        </section>

      </section>
      <section class="redes-sociales">
        <a href="https://jova0411.wixsite.com/techwebpelzc" target="_blank" title="Sitio web"class="behance"><img src="Imagenes/website.png"></a>
        <a href="https://www.facebook.com/TechWebPELZC/" target="_blank" title="Facebook" class="facebook"><span class="fa fa-facebook"></span></a>
        <a href="https://twitter.com/TechWebPE_LZC" target="_blank" title="Twitter" class="twitter"><span class="fa fa-twitter"></span></a>
        <a href="" target="_blank" title="Instagram" class="instagram"><span class="fa fa-instagram"></span></a>
        <a href="" target="_blank" title="Youtube" class="youtube"><span class="fa fa-youtube"></span></a>
      </section>
    </section>
  </div>
  <script src="./script.js"></script>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="js/main-tarjeta.js"></script>

           <footer>
           		<center>Bi Web</center>
           		Pagina oficial: <a href="https://jova0411.wixsite.com/techwebpelzc">TechWeb PE LZC</a>
           		Redes sociales: 
           		<a href="https://www.facebook.com/TechWebPELZC/" target="_blank" title="Facebook"><img src="Imagenes/facebook.wix_mp"></a>
           		<a href="https://www.instagram.com/techweblzc/?hl=es-la" target="_blank" title="Instagram"><img src="Imagenes/Instagram.webp"></a>
           		<a href="https://twitter.com/TechWebPE_LZC" target="_blank" title="Twitter"><img src="Imagenes/twitter.webp"></a>
           		<a href="https://www.youtube.com/channel/UClhQx2c6LSgtT5f87jC2vxg" target="_blank" title="Youtube"><img src="Imagenes/youtube.webp"></a>
           </footer> 
	</body>
	</html>