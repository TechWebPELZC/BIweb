<?php
$idlibro = $_REQUEST['idlibro'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ingreso Editorial</title>
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
				<a href="NvoEditorial.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Ingresar Nuevo Editorial</a>
				<br>
				<a href="AgregarEditorial.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Anexar editorial al Libro</a>
				<br>
		</form>
	</div>
</body>
</html>