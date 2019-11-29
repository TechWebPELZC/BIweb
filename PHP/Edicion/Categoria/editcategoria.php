<?php
include '../../conn.php';
session_start();
  if (!isset($_SESSION['usuario'])) {
      header('Location: ../Ingresar.php');
    }else {
      if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
      header('Location: ../Ingresar.php');
    }
  }

$idlibro = $_REQUEST['idl'];
$sql = "SELECT ID_Categoria, CONCAT( ID_Categoria, ' - ', Nom_Categoria) AS Categoria FROM categoria_book";
$result = $conn->query($sql);
$sqlcate = "SELECT * FROM b_book WHERE ID_Libro = $idlibro";
$resultcate = $conn->query($sqlcate);
$row = $resultcate->fetch_assoc();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editar categoria</title>
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
			<h2><span>Editar Categoria</span></h2>
		</div>		
		<form class="form__reg" id="form" action="editcate.php?idl=<?php echo $idlibro;?>" method="post" enctype="multipart/form-data">
		<select class="input" name="cate" required>
			<option selected value="">Categoria </option>
	<?php

		if($result->num_rows > 0){
			while($row2 = $result->fetch_assoc()){
				if ($row['ID_Categoria'] == $row2['ID_Categoria']) {
		?>
			<option value="<?php echo $row2['ID_Categoria']?>" selected><?php echo $row2['Categoria']?></option>
		<?php
		} else {
			?>
			<option value="<?php echo $row2['ID_Categoria']?>"><?php echo $row2['Categoria']?></option>
			<?php
		}
	}
}
?>
		</select>
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
		</div>

	</body>
</html>