<?php
//Connection for database
include '../../conn.php';
//Select Database
$idlibro = $_REQUEST['idlibro'];

$sql = "SELECT bautor.ID_Libro, bautor.ID_Autor AS idautor, CONCAT( au.ID_Autor, ' - ', CONCAT(au.Nom_Autor, ' ', au.AP_Autor, ' ', au.AM_Autor)) AS Autor FROM b_autor AS au INNER JOIN bk_autorbook AS bautor ON au.ID_Autor = bautor.ID_Autor WHERE bautor.ID_Libro = $idlibro";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT ID_Autor, CONCAT( ID_Autor, ' - ', CONCAT(Nom_Autor, ' ', AP_Autor, ' ', AM_Autor)) AS Autor FROM b_autor";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Editar Autor</title>
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
			<h2><span>Editar Autor</span></h2>
		</div>		
		<form class="form__reg" id="form" action="AddAutor.php?idlibro=<?php echo $idlibro; ?>" method="post">
		<select class="input" name="idau" required>
			<option value=""> ID Autor </option>
	<?php

		if($result2->num_rows > 0){
			while($row2 = $result2->fetch_assoc()){
				if ($row['idautor']==$row2['ID_Autor']) {
	?>		
		<option value="<?php echo $row2['ID_Autor']?>" selected><?php echo $row2['Autor']?></option>

		<?php
				} else {  
		?>
			<option value="<?php echo $row2['ID_Autor']?>"><?php echo $row2['Autor']?></option>
		<?php
				}
	}
}
?>
		</select>
		<div class="btn__form">
            	<input class="btn__submit" type="submit" value="Guardar">
            	<input class="btn__reset" type="reset" value="Limpiar datos">	
            </div>
            <br>
            <center>
            <a href="AptrAutor.php?idl=<?php echo $idlibro;?>" class="boton_personalizado">Regresar</a>
        </center>
		</form>
		</div>

	</body>
</html>