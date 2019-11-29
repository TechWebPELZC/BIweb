<?php
//Connection for database
include '../../conn.php';
//Select Database
$idlibro = $_REQUEST['idl'];

$sql = "SELECT ID_Caract, Sinopsis FROM caract_book";
$result = $conn->query($sql);

$sql2 = "SELECT caract.ID_Libro, s.ID_Caract AS idsinopsis, s.Sinopsis FROM caract_book AS s INNER JOIN bk_caractbook AS caract ON s.ID_Caract = caract.ID_Caract WHERE caract.ID_Libro = $idlibro";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Editar Sinopsis</title>
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
			<h2><span>Editar Sinopsis</span></h2>
		</div>		
		<form class="form__reg" id="form" action="EditSinopsis.php?idlibro=<?php echo $idlibro; ?>&ids=<?php echo $row2["idsinopsis"];?>" method="post">
	<?php

	if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){   
		if($row2['idsinopsis']==$row['ID_Caract']){
				$sin = $row['Sinopsis'];
		}
	}
}
		?>
			<textarea name="sinopsis" rows="10" cols="40" placeholder="Escribe aquí la sipnosis del libro"><?php echo $sin; ?></textarea>

		<div class="btn__form">
            	<input class="btn__submit" type="submit" value="Guardar">
            	<input class="btn__reset" type="reset" value="Limpiar datos">	
            </div>
            <br>
            <center>
            <a href="../apartadosedit.php?id=<?php echo $idlibro;?>" class="boton_personalizado">Regresar</a>
        </center>
		</form>
		</div>

	</body>
</html>