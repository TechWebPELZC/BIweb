<?php
//Connection for database
include '../conn.php';
session_start();
  if (!isset($_SESSION['usuario'])) {
      header('Location: ../Ingresar.php');
    }else {
      if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
      header('Location: ../Ingresar.php');
    }
  }
//Select Database
$sql = "SELECT ID_Categoria, CONCAT( ID_Categoria, ' - ', Nom_Categoria) AS Categoria FROM categoria_book";
$result = $conn->query($sql);

$sql2 = "SELECT ID_Pais, CONCAT( ID_Pais, ' - ', Pais) AS N_Pais FROM pais_book";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registrar Libros</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../CSS/main.css">
		<link rel="shortcut icon" href="../../assets/icons/book.ico" />
	</head>
	<body class="full-cover-background" style="background-image:url(../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Registro de libros</span></h2>
		</div>		
		<form class="form__reg" id="form" action="insertar.php" method="post" enctype="multipart/form-data">
			<select class="input" name="categoria" required>
			<option selected value="">Categoria </option>
	<?php

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
		?>
			<option value="<?php echo $row['ID_Categoria']?>"><?php echo $row['Categoria']?></option>
		<?php
	}
}
?>
		</select>
		<select class="input" name="pais" required>
			<option selected value=""> País </option>
	<?php

		if($result2->num_rows > 0){
			while($row2 = $result2->fetch_assoc()){
		?>
			<option value="<?php echo $row2['ID_Pais']?>"><?php echo $row2['N_Pais']?></option>
		<?php
	}
}
?>
		</select>
			<input class="input" type="text" id="tituloL" name="tituloL" placeholder="Titulo del libro" required autofocus>
			<input class="input" type="text" id="isbn" name="isbn" placeholder="ISBN" required autofocus>
			<input class="input" type="text" id="lugar" name="lugar" placeholder="Lugar de edición" required>
            <input class="input" type="text" id="edicion" name="edicion" placeholder="Edición" required>
            <input class="input" type="text" id="anioEd" name="anioEd" placeholder="Año de edición" required>
            <input class="input" type="text" id="paginas" name="paginas" placeholder="Número de páginas" required>
            <br>
            <input type="file" name="file1" id="file1" accept="images/png, images/jpg">
            <br>
            <textarea name="link" rows="10" cols="40" placeholder="Inserta el link de acceso al libro"></textarea>
        	<br>
        	<br>
            <div class="btn__form">
            	<input class="btn__submit" type="submit" value="Guardar">
            	<input class="btn__reset" type="reset" value="Limpiar datos">	
            </div>
		</form>
		<br>
            <center>
            	<a href="Categoria/NvaCategoria.php"><button class="btn_dinamico">Ingresar Nueva Categoria</button></a>
            </center>
            <br>
            <center>
            	<a href="Idioma/NvoIdioma.php"><button class="btn_dinamico">Ingresar Nuevo Idioma</button></a>
            </center>
            <br>
            <center>
            	<a href="../../admin/LibrosAdmin.php"><button class="btn_dinamico"><span class="icon-reply"> Regresar</span></button></a>
            </center>
		</div>
	</body>
</html>