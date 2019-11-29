<?php
  require 'PHP/conn.php';
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
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Ingresar</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="./assets/icons/book.ico" />
    <link rel="manifest" href="./manifest.json">
  </head>
  <body class="full-cover-background" style="background-image:url(assets/img/font-login.jpg);">
    <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo por favor</span>
    </div>
    <div class="ban">
      <span>Usted se encuentra Baneado, por favor comuniquese con el Administrador</span>
    </div>
    <div class="main">
     <form action="" id="formLg">
      <font face="verdana" color="black"><h2 align="center">Inicio de sesión</h2></font>
        <input class="estilos_texto" type="text" pattern="[A-Za-z0-9_-]{1-15}" name="usuariolg" placeholder="&#128100; Usuario" required >
        <input class="estilos_texto" type="password"  name="passlg" placeholder="&#x1F512; Contraseña" required>
        <input type="submit" class="botonlg" id="btnlg" value="Iniciar Sesion" >
        <br>
        <p>¿No te has registrado? <a href="Registrar.php">Registrate ahora </a></p>
        <p><a href="Index.php">Regresar</a></p>
     </form>
    </div>
    <script src="./script.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/indexmain.js"></script>
  </body>
</html>