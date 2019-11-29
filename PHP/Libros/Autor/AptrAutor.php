<?php
$idlibro = $_REQUEST['idlibro'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ingreso Autor</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../../CSS/main.css">
	</head>
	<body class="full-cover-background" style="background-image:url(../../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Apartados</span></h2>
		</div>
		<form class="form__reg" id="form">	
				<a href="NvoAutor.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Ingresar Nuevo Autor</a>
				<br>
				<a href="AgregarAutor.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar autor al Libro</a>
				<br>
		</form>
	</div>
</body>
</html>