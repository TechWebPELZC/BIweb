<?php
$idl = $_REQUEST['idl'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Registrar País</title>
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
			<h2><span>Registrar País</span></h2>
		</div>		
		<form class="form__reg" id="form" action="pais.php?idl=<?php echo $idl;?>" method="post">
			<input class="input" type="text" name="pais" placeholder="Ingrese el nombre del pais" required autofocus>
            <br>
		<br>
            <div class="btn__form">
            	<input class="btn__submit" type="submit" value="Guardar">
            	<input class="btn__reset" type="reset" value="Limpiar datos">	
            </div>
            <br>
            <center>
            <a href="AptrPais.php?idl=<?php echo $idl;?>" class = "boton_personalizado">Regresar</a>
        	</center>
		</form>
		</div>

	</body>
</html>
