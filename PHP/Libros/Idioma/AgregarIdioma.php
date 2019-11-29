<?php
//Connection for database
include '../../conn.php';
//Select Database
$idlibro = $_REQUEST['idlibro'];

$sql2 = "SELECT ID_Idioma, CONCAT( ID_Idioma, ' - ', Idioma) AS Idioma FROM idioma_book";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Agregar Idioma</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../../CSS/main.css">
	</head>
	<body class="full-cover-background" style="background-image:url(../../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Agregar Idioma</span></h2>
		</div>		
		<form class="form__reg" id="form" action="AddIdioma.php?idlibro=<?php echo $idlibro;?>" method="post">
		<select class="input" name="idioma" required>
			<option selected value=""> ID Idioma </option>
	<?php

		if($result2->num_rows > 0){
			while($row2 = $result2->fetch_assoc()){
		?>
			<option value="<?php echo $row2['ID_Idioma']?>"><?php echo $row2['Idioma']?></option>
		<?php
	}
}
?>
		</select>
		<div class="btn__form">
            	<input class="btn__submit" type="submit" value="Guardar">
            	<input class="btn__reset" type="reset" value="Limpiar datos">	
            </div>
		</form>
		</div>

	</body>
</html>