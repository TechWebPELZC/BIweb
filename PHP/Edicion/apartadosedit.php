<?php
include '../conn.php';
    session_start();
    if (!isset($_SESSION['usuario'])) {
            header('Location: ../Ingresar.php');
        }else {
            if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
            header('Location: ../Ingresar.php');
        }
    }

$idl = $_REQUEST['id'];
$sql = "SELECT * FROM b_book WHERE ID_Libro = $idl";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Apartados de Edicion</title>
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
			<h2><span>Apartados de Edición del libro</span></h2>
		</div>
		<form class="form__reg" id="form">		
				<a href="editgeneral.php?idl=<?php echo $idl;?>" class="boton_personalizado">Editar informacion general</a>
				<br>
				<a href="Categoria/APtrCategoria.php?idl=<?php echo $idl;?>" class="boton_personalizado">Editar Categoria</a>
				<br>
				<a href="Pais/AptrPais.php?idl=<?php echo $idl;?>" class="boton_personalizado">Editar Pais</a>
				<br>
				<a href="Autor/AptrAutor.php?idl=<?php echo $idl;?>" class="boton_personalizado">Edición del Autor</a>
				<br>
				<a href="Editorial/AptrEditorial.php?idl=<?php echo $idl;?>" class="boton_personalizado">Edición de la Editorial</a>
				<br>
				<a href="Idioma/AptrIdioma.php?idl=<?php echo $idl;?>" class="boton_personalizado">Edición del Idioma</a>
				<br>
				<a href="Sinopsis/EditarSinopsis.php?idl=<?php echo $idl;?>" class="boton_personalizado">Editar Sinopsis</a>
				<br>
		</form>
	</div>
				<br>
				<center><a href="../../admin/EdicionLibros/EditarLibros.php"><button class="boton_1">Registro Completo</button></a></center>
</body>
</html>