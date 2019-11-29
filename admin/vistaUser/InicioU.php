<?php
	require '../../PHP/conn.php';
	session_start();
	if (!isset($_SESSION['usuario'])) {
			header('Location: ../../Ingresar.php');
		}else {
			if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
			header('Location: ../../Ingresar.php');
		}
	}
//Select Database
$sql = "SELECT b.ID_Libro, b.Titulo_Libro,b.Portada, sum(v.No_vistas) as suma FROM b_book AS b  INNER join b_topvistas AS v ON b.ID_Libro = v.ID_Libro group by v.ID_Libro order by suma desc limit  0,10";
$result = $conn->query($sql);

$sql2 = "SELECT ID_Libro, Titulo_Libro,Portada FROM b_book group by ID_Libro order by fecha_ingreso desc limit  5";
$result2 = $conn->query($sql2);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Inicio</title>
		<link rel="stylesheet" type="text/css" href="../../CSS/fonts.css">
		<link rel="shortcut icon" href="../../assets/icons/book.ico" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		 <link rel="stylesheet" type="text/css" href="../../CSS/nuevo-menu.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../js/nuevo-menu.js"></script>
    <link rel="manifest" href="./../../manifest.json">
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
              <img src="../../Imagenes/Logo.png" width = "20%" height="20%">
            </tr>
            <tr>
              <br>
              <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>  
            </tr>
          </table>
        <li><a href="InicioU.php"><span class="icon-home3"></span>Inicio</a></li>
        <li><a href="Biblioteca.php"><span class="icon-books"></span>Biblioteca</a></li>
        <li><a href="../LibrosAdmin.php"><img src="../../Imagenes/regresar.png" width="30" height="30"></a></li>
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
	         	<td width = '60' height='60' title="<?php echo $row['Titulo_Libro']; ?>"><a href="Bibliografia/bibliografia.php?id=<?php echo $row['ID_Libro'];?>"><img src='../../<?php echo $row['Portada']; ?>' width = '100' height='150'></a></td>
	       
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
	         	<td width = '60' height='60' title="<?php echo $row2['Titulo_Libro']; ?>"><a href="../Bibliografia/bibliografia.php?id=<?php echo $row['ID_Libro'];?>"><img src='../../<?php echo $row2['Portada']; ?>' width = '100' height='150'></a></td>
	       
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
            </section>
            <br>
            <script src="./../../script.js"></script>
            <footer>
              <center>Bi Web</center>
              Pagina oficial: <a href="https://jova0411.wixsite.com/techwebpelzc">TechWeb</a>
              Redes sociales: 
              <a href="https://www.facebook.com/TechWebPELZC/" target="_blank" title="Facebook"><img src="../../Imagenes/facebook.wix_mp"></a>
              <a href="https://www.instagram.com/techweblzc/?hl=es-la" target="_blank" title="Instagram"><img src="../../Imagenes/Instagram.webp"></a>
              <a href="https://twitter.com/TechWebPE_LZC" target="_blank" title="Twitter"><img src="../../Imagenes/twitter.webp"></a>
              <a href="https://www.youtube.com/channel/UClhQx2c6LSgtT5f87jC2vxg" target="_blank" title="Youtube"><img src="../../Imagenes/youtube.webp"></a>
           </footer>   
	</body>
	</html>