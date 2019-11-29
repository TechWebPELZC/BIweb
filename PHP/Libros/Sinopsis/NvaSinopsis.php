<?php
$idlibro = $_REQUEST['idlibro'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registrar Sinopsis</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../../CSS/main.css">
	</head>
	<body class="full-cover-background" style="background-image:url(../../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Registrar Sinopsis</span></h2>
		</div>		
		<form class="form__reg" id="form" action="sinopsis.php?idlibro=<?php echo $idlibro; ?>" method="post">
			<textarea name="sinopsis" rows="10" cols="40" placeholder="Escribe aquí la sipnosis del libro"></textarea>
            <br>
		<br>
            <div class="btn__form">
            	<input class="btn__submit" type="submit" value="Guardar">
            	<input class="btn__reset" type="reset" value="Limpiar datos">	
            </div>
		</form>
		</div>

	</body>
</html>
