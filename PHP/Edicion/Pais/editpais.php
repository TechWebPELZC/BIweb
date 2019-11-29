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
$sql = "SELECT ID_Pais, CONCAT( ID_Pais, ' - ', Pais) AS N_Pais FROM pais_book";
$result = $conn->query($sql);
$sqlpais = "SELECT * FROM b_book WHERE ID_Libro = $idlibro";
$resultpais = $conn->query($sqlpais);
$row2 = $resultpais->fetch_assoc();
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
			<h2><span>Editar Pais</span></h2>
		</div>		
		<form class="form__reg" id="form" action="proceso/editps.php?idl=<?php echo $idlibro;?>&idc=<?php echo $idcate;?>" method="post" enctype="multipart/form-data">
		<select class="input" name="pais" required>
			<option selected value="">Pais </option>
	<?php

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if ($row2['ID_Pais'] == $row['ID_Pais']) {
		?>
			<option value="<?php echo $row['ID_Pais']?>" selected><?php echo $row['N_Pais']?></option>
		<?php
		} else {
			?>
			<option value="<?php echo $row['ID_Pais']?>"><?php echo $row['N_Pais']?></option>
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
            <a href="AptrPais.php?idl=<?php echo $idlibro;?>" class = "boton_personalizado">Regresar</a>
        	</center>
		</form>
		</div>

	</body>
</html>