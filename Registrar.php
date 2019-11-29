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
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz-+:";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }

    function limpia() {
        var val = document.getElementById("miInput").value;
        var tam = val.length;
        for(i = 0; i < tam; i++) {
            if(!isNaN(val[i]))
                document.getElementById("miInput").value = '';
        }
    }
</script>
<html>
	<head>
		<title>Registrar</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="shortcut icon" href="./assets/icons/book.ico" />
		<link rel="stylesheet" href="CSS/main.css">
    	<script src="js/SendForm.js"></script>
		<link rel="manifest" href="./manifest.json">
	</head>
	<body class="full-cover-background" style="background-image:url(assets/img/font-login.jpg);">
		<section class="contenido">
			<div class="container">
			<div class="form__top">
				<h2><span>Registro de usuario</span></h2>
			</div>		
			<form class="form__reg" action="PHP/RegistroUsuario/reg.php" method="POST">
				<input class="input" type="text" name="AP" placeholder="&#128100;  Apellido Paterno" required autofocus maxlength="15" onkeypress="return soloLetras(event)" onblur="limpia()">
				<input class="input" type="text" name="AM" placeholder="&#128100;  Apellido Materno" required autofocus maxlength="16" onkeypress="return soloLetras(event)" onblur="limpia()">
				<input class="input" type="text" name="nombre" placeholder="&#128100;  Nombre" required maxlength="20" onkeypress="return soloLetras(event)" onblur="limpia()">
	            <input class="input" type="text" name="nombreusuario" placeholder="&#128100;  Nombre de Usuario" required maxlength="10">
	            <input class="input" type="email" name="mail" placeholder="&#9993;  Email" required>
	            <br>
	            Fecha de Nacimiento
	            <input class="input" type="date" name="dateb" placeholder="&#128100;  Fecha de Nacimiento" required>
	            <input title="La contraseña debe contener una letra mayuscula, una minuscula y un numero" class="input" type="password" name="pass" placeholder="&#x1F512;  Contraseña" required>
	            <input class="input" type="password" name="Rpass" placeholder="&#x1F512;  Repetir contraseña" required>
	            <br>
	            <diV>
		            Sexo:
		            <br>
		            Femenino <input type="radio" name="genero" value="F">
		            Masculino <input type="radio" name="genero" value="M" checked>
	        	</diV>
	        	<br>
	        	<diV>
		            Actividad:
		            <br>
		            Alumno <input type="radio" name="actividad" value="Alumno" checked>
		            Profesor <input type="radio" name="actividad" value="Profesor">
	        	</diV>
	            <div class="btn__form">
	            	<input class="btn__submit" type="submit" value="Registrarse">
	            	<input class="btn__reset" type="reset" value="Limpiar datos">
	            </div>
	            	<br>
	            		<center>
	            		<a class="btn_dinamico" href="Index.php">Regresar</a>
	            		</center>
	            	</br>
			</form>
			</div>
	    </section>
	    <script src="./script.js"></script>
	</body>
</html>