<?php
//Connection for database
require 'PHP/conn.php';
session_start();
if (isset($_SESSION['usuario'])) {
	if ($_SESSION['usuario']['TipoUsuario'] == "Admin") {
		header('Location: admin/InicioAdmin.php');
	}elseif ($_SESSION['usuario']['TipoUsuario'] == "Usuario") {
		header('Location: usuario/InicioU.php');
	}
}

//Select Database
$sql = "SELECT b.Titulo_Libro, b.Link_book, b.Portada, sum(v.No_vistas) as suma FROM b_book AS b  INNER join b_topvistas AS v ON b.ID_Libro = v.ID_Libro group by v.ID_Libro order by suma desc limit 10";
$result = $conn->query($sql);
    function contador()
    {
        $archivo = "contador.txt"; //el archivo que contiene en numero
        $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
        if($f)
        {
            $contador = fread($f, filesize($archivo)); //leemos el archivo
            $contador = $contador + 1; //sumamos +1 al contador
            fclose($f);
        }
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f, $contador);
            fclose($f);
        }
        return $contador;
    }
$sql2 = "SELECT Titulo_Libro, Portada FROM b_book group by ID_Libro order by fecha_ingreso desc limit 5";
$result2 = $conn->query($sql2);
   

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8"/>
		<title>Inicio</title>
    	<link rel="shortcut icon" href="./assets/icons/book.ico" />
		<link rel="stylesheet" type="text/css" href="CSS/fonts.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="CSS/nuevo-menu.css">
		<link rel="stylesheet" href="CSS/main.css">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/nuevo-menu.js"></script>

      <meta name="MobileOptimized" content="width">
      <meta name="HandheldFriendly" content="true">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <link rel="shortcut icon" type="image/png" href="./Imagenes/Logo.png">
      <link rel="apple-touch-icon" href="./Imagenes/Logo.png">
      <link rel="apple-touch-startup-image" href="./Imagenes/Logo.png">
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
          <!-- Contenido -->
          <section class="contenido">
          		<br>
               <h1><i><p><center>Bienvenido al portal gratuito de libros digitalizados en la biblioteca</center></p></i></h1>
               <br>
               <br>
                <h2><i><p><center>Libros más vistos</center></p></i></h2>
                <br>
               <center><table width="80%" align="center" id="central" id="datos">
              <tr>
              	
              	<?php
		          if($result->num_rows > 0){
		            while ($row = $result->fetch_assoc()) {

		         ?>
	         	<td width = '60' height='60' title="<?php echo $row['Titulo_Libro']; ?>"><img src='<?php echo $row['Portada']; ?>' width = '100' height='150'></td>
	       
	       <?php
					  }
				?>
				</tr>
				<?php	  
					}
					else
					{
					  ?>
					  <tr>
					    <th colspan="2">There's No data found!!!</th>
					    </tr>
					    <?php
					}
				?>
				</table>
			</center>
			<br>
			<br>
			<h2><i><p><center>Libros ingresados recientemente</center></p></i></h2>
			<br>
               <center><table width="80%" align="center" id="central" id="datos">
              <tr>
              	
              	<?php
		          if($result2->num_rows > 0){
		            while ($row2 = $result2->fetch_assoc()) {

		         ?>
	         	<td width = '60' height='60' title="<?php echo $row2['Titulo_Libro']; ?>"><img src='<?php echo $row2['Portada']; ?>' width = '100' height='150'></td>
	       
	       <?php
					  }
				?>
				</tr>
				<?php	  
					}
					else
					{
					  ?>
					  <tr>
					    <th colspan="2">There's No data found!!!</th>
					    </tr>
					    <?php
					}
				?>
				</table>
			</center>
			<br>
			<br>
           </section>
           <script src="./script.js"></script>
           <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/indexmain.js"></script>

           <footer>
           		<center>Bi Web</center>
           		Pagina oficial: <a href="https://jova0411.wixsite.com/techwebpelzc">TechWeb</a>
           		Redes sociales: 
           		<a href="https://www.facebook.com/TechWebPELZC/" target="_blank" title="Facebook"><img src="Imagenes/facebook.wix_mp"></a>
           		<a href="https://www.instagram.com/techweblzc/?hl=es-la" target="_blank" title="Instagram"><img src="Imagenes/Instagram.webp"></a>
           		<a href="https://twitter.com/TechWebPE_LZC" target="_blank" title="Twitter"><img src="Imagenes/twitter.webp"></a>
           		<a href="https://www.youtube.com/channel/UClhQx2c6LSgtT5f87jC2vxg" target="_blank" title="Youtube"><img src="Imagenes/youtube.webp"></a>
           		<br>
           		<?php echo "Visitas en el sitio web:  ".contador()?>
           </footer>
           <script src="./script.js"></script>
	</body>
	</html>