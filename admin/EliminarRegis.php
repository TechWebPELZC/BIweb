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
		<title>Inicio</title>
    <link rel="shortcut icon" href="../assets/icons/book.ico" />
		<style>
		table.tabla_datos {
  			border: 1px solid #1C6EA4;
  			background-color: #EEEEEE;
  			width: 100%;
  			text-align: left;
  			border-collapse: collapse;
		}
		table.tabla_datos td, table.tabla_datos th {
  			border: 1px solid #AAAAAA;
  			padding: 3px 2px;
		}
		table.tabla_datos tbody td {
  			font-size: 13px;
		}	
		table.tabla_datos tr:nth-child(even) {
  			background: #D0E4F5;
		}
		table.tabla_datos thead {
  			background: #1C6EA4;
  			background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  			background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  			background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  			border-bottom: 2px solid #444444;
		}	
		table.tabla_datos thead th {
  			font-size: 15px;
  			font-weight: bold;
  			color: #FFFFFF;
  			border-left: 2px solid #D0E4F5;
		}
		table.tabla_datos thead th:first-child {
  			border-left: none;
		}

		table.tabla_datos tfoot {
  			font-size: 14px;
  			font-weight: bold;
  			color: #FFFFFF;
  			background: #D0E4F5;
  			background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  			background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  			background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  			border-top: 2px solid #444444;
		}			
		table.tabla_datos tfoot td {
  			font-size: 14px;
		}
		table.tabla_datos tfoot .links {
  			text-align: right;
		}
		table.tabla_datos tfoot .links a{
  			display: inline-block;
 		 	background: #1C6EA4;
  			color: #FFFFFF;
  			padding: 2px 8px;
  			border-radius: 5px;
}

	</style>
		<link rel="stylesheet" type="text/css" href="CSS/fonts.css">
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
              <img src="Imagenes/Logo.png" width = "20%" height="20%">
            </tr>
            <tr>
              <br>
              <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>  
            </tr>
          </table>
        <li><a href="UsersAdmin.php"><span class="icon-users"></span>Usuarios</a></li>
        <li><a href="LibrosAdmin.php"><span class="icon-books"></span>Libros</a></li>
        <li><a href="GraficasAdmin.php"><span class="icon-stats-bars"></span> Historial de libros</a></a></li>
        <li class="submenu">
          <a href="#"><span class="icon-user"></span>Perfil<span class="caret icon-keyboard_arrow_down"></span></a>
          <ul class="children">
            <li><a href="PerfilAdmin.php">Mi Perfil <span class="icon-profile"></span></a></li>
            <li><a href="../PHP/cierre.php">Cerrar sesión <span><img src="../Imagenes/cerrar-sesion.png" width = "10" height="10"></span></a></li>
          </ul>
        </li>
        
      </ul>
    </nav>
    </center> 
  </header>

          <!-- Contenido -->
          <section class="contenido">

               <h1><i><p><center>Bienvenido</center></p></i></h1>

               <center>
               <h3>Ingrese el ID del libro (ID_Libro)</h3>
               <form action="PHP/borrar.php" method="post" name="form">
               		<input type="text" name="id">
               		<br>
               		<br>
               		<input type="submit" name="Eliminar libro">
               		<br>
            		<br>
               	
               </form>
           </center>
           <div id="datos">
					
			</div>
			<br>
            <br>
			<center><input type="button" value="Regresar" onclick = "location='Libros1.html'"/></center>

            </section>
            <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
			<script src="js/jquery-1.7.2.min.js"></script>
			<script src="js/main.js"></script>
      <script src="./../script.js"></script>
	</body>
	</html>