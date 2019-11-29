<?php

	session_start();
	if (!isset($_SESSION['usuario'])) {
			header('Location: ../../Ingresar.php');
		}else {
			if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
			header('Location: ../../Ingresar.php');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registrar usuarios</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../CSS/main.css">
		<link rel="stylesheet" href="../../CSS/Estilos.css">
		<link rel="stylesheet" type="text/css" href="../../CSS/fonts.css">
		<link rel="shortcut icon" href="../../assets/icons/book.ico" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	
	</head>
	<body class="full-cover-background" style="background-image:url(../../assets/img/font-login.jpg);">
			<div class="container">
			<div class="form__top">
				<h2><span>Registro de usuario</span></h2>
			</div>		
			<form class="form__reg" action="registroAdmin.php" method="POST">
				<input class="input" type="text" name="AP" placeholder="&#128100;  Apellido Paterno" required autofocus>
				<input class="input" type="text" name="AM" placeholder="&#128100;  Apellido Materno" required autofocus>
				<input class="input" type="text" name="nombre" placeholder="&#128100;  Nombre" required>
	            <input class="input" type="text" name="nombreusuario" placeholder="&#128100;  Username" required>
	            <input class="input" type="email" name="mail" placeholder="&#9993;  Email" required>
	            <br>
	            Fecha de Nacimiento
	            <input class="input" type="date" name="dateb" placeholder="&#128100;  Fecha de Nacimiento" required>
	            <input class="input" type="password" name="pass" placeholder="&#x1F512;  Contraseña" required>
	            <input class="input" type="password" name="Rpass" placeholder="&#x1F512;  Repetir contraseña" required>
	            <br>
	            <diV>
		            Sexo:
		            <br>
		            <br>
		            Femenino<input type="radio" name="genero" value="F">
		            Masculino<input type="radio" name="genero" value="M" checked>
	        	</diV>
	        	<br>
	        	<diV>
		            Actividad:
		            <br>
		            Alumno <input type="radio" name="actividad" value="Alumno" checked>
		            Profesor <input type="radio" name="actividad" value="Profesor">
	        	</diV>
	        	<br>
	        	<diV>
		            Tipo de usuario:
		            <br>
		            <br>
		            Usuario<input type="radio" name="tipo" value="Usuario" checked>
		            Admin<input type="radio" name="tipo" value="Admin">
	        	</diV>
	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" value="Registrarse">
	            	<input class="btn__reset" type="reset" value="Limpiar datos">	
	            </div>
			</form>
			</div>
	</body>
</html>