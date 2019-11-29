<?php
$idlibro = $_REQUEST['idlibro'];
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Registrar Categoria</title>
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
			<h2><span>Registrar Categoria</span></h2>
		</div>		
		<form class="form__reg" id="form" action="categoria.php?idl=<?php echo $idlibro; ?>" method="post">
			<input class="input" type="text" name="categoria" placeholder="Ingrese la nueva categoria" required autofocus>
            <br>
		<br>
            <div class="btn__form">
            	<input class="btn__submit" type="submit" value="Guardar">
            	<input class="btn__reset" type="reset" value="Limpiar datos">	
            </div>
            <br>
            <center>
            <a href="AptrCategoria.php?idl=<?php echo $idlibro;?>" class="boton_personalizado">Regresar</a>
        </center>
		</form>
		</div>n 

	</body>
</html>
		