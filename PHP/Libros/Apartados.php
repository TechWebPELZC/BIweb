<?php
$idlibro = $_REQUEST['idlibro'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Apartados del libro</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../CSS/main.css">
	</head>
	<body class="full-cover-background" style="background-image:url(../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Apartados del libro</span></h2>
		</div>
		<form class="form__reg" id="form">	
				<a href="InsertLibro.php" class="boton_personalizado">Ingresar datos generales del Libro</a>
				<br>
				<a href="NvaCategoria.html" class="boton_personalizado">Ingresar Nueva categoria</a>
				<br>
				<a href="AgregarCategoria.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar categoria al Libro</a>
				<br>
				<a href="NvoPais.html" class="boton_personalizado">Ingresar Nuevo pais</a>
				<br>
				<a href="AgregarPais.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar pais al Libro</a>
				<br>
				<a href="NvoIdioma.html" class="boton_personalizado">Ingresar Nuevo idioma</a>
				<br>
				<a href="AgregarIdioma.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar idioma al Libro</a>
				<br>
				<a href="NvoEditorial.html" class="boton_personalizado">Ingresar Nuevo Editorial</a>
				<br>
				<a href="AgregarEditorial.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar Editorial al Libro</a>
				<br>
				<a href="NvoAutor.html" class="boton_personalizado">Ingresar Nuevo Autor</a>
				<br>
				<a href="AgregarAutor.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar Autor al Libro</a>
				<br>
				<a href="NvaSinopsis.html" class="boton_personalizado">Ingresar una sinopsis</a>
				<br>
				<a href="AgregarSinopsis.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar sinopsis al Libro</a>
				<br>
		</form>
	</div>
				<br>
				<center><a href="../../Libros1.html" class = "boton_1" style="display: none;">Registro Completo</a></center>
</body>
</html>