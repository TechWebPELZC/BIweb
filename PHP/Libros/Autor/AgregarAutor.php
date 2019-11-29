<?php
//Connection for database
include '../../conn.php';
//Select Database
$idlibro = $_REQUEST['idlibro'];

$sql2 = "SELECT ID_Autor, CONCAT( ID_Autor, ' - ', CONCAT(Nom_Autor, ' ', AP_Autor, ' ', AM_Autor)) AS Autor FROM b_autor";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Agregar Autor</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../../CSS/main.css">
	</head>
	<body class="full-cover-background" style="background-image:url(../../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Agregar Autor</span></h2>
		</div>		
		<form class="form__reg" id="form" action="AddAutor.php?idlibro=<?php echo $idlibro; ?>" method="post">
		<select class="input" name="idau" required>
			<option selected value=""> ID Autor </option>
	<?php

		if($result2->num_rows > 0){
			while($row2 = $result2->fetch_assoc()){
		?>
			<option value="<?php echo $row2['ID_Autor']?>"><?php echo $row2['Autor']?></option>
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