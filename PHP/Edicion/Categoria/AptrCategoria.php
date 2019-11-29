<?php
$idlibro = $_REQUEST['idl'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edición Categoria</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../../CSS/main.css">
		<link rel="shortcut icon" href="../../../assets/icons/book.ico" />
	</head>
	<body class="full-cover-background" style="background-image:url(../../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Apartados</span></h2>
		</div>
		<form class="form__reg" id="form">	
				<a href="NvaCategoria.php?idlibro=<?php echo $idlibro;?>" class="boton_personalizado">Ingresar Nueva categoria</a>
				<br>
				<a href="editcategoria.php?idl=<?php echo $idlibro;?>" class="boton_personalizado">Editar Categoria</a>
				<br>
		</form>
	</div>
	<br>
				<center><a href="../apartadosedit.php?id=<?php echo $idlibro;?>"><button class="boton_1">Regresar</button></a></center>
</body>
</html>