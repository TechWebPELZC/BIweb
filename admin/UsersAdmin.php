<?php

	session_start();
	if (!isset($_SESSION['usuario'])) {
			header('Location: ../Ingresar.php');
		}else {
			if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
			header('Location: ../Ingresar.php');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Lista de Usuarios</title>
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
        <li><a href="UsersAdmin.php"><span class="icon-users"></span>Usuarios</a></li>
        <li><a href="LibrosAdmin.php"><span class="icon-books"></span>Libros</a></li>
        <li><a href="GraficasAdmin.php"><span class="icon-stats-bars"></span>Graficas</a></a></li>
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
			<br>
			<font face="impact" size="5"><div align="center"><h1>Consulta de usuarios</h1></div></font>
			<br>
			<div class="form-1-2" align="center">
				<b><font face="verdana" color="blue"><label for="caja_busqueda">Buscar: </label></font></b>
				<input type="text" name="caja_busqueda" id="caja_busqueda"></input>
			</div>
			<br>
            <div class="table-responsive" id="datos">
				
			</div>
            <div>
                <br>
                <br>
                <center>
                	<a class="boton_personalizado" href="EdicionUsers/RegistrarAdmin.php"><span class="icon-user-plus"> Ingresar usuario</span></a>
                	<a href="EdicionUsers/EditarUsuarios.php" class="boton_personalizado"><span class="icon-pencil2"> Edición</span></a>
                </center>
                <br>
                <br>
            </div>
		</section>
    <script src="./../script.js"></script>
		   <footer>
           		<center>Bi Web</center>
           </footer>
		<script src="../js/jquery-1.7.2.min.js"></script>
		<script src="../js/main2.js"></script>

	</body>
	</html>