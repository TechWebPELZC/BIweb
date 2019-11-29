<?php
//Connection for database
include '../conn.php';
//Select Database
$id = $_REQUEST['id'];
$sql = "SELECT Us_User, TipoUsuario FROM b_users WHERE ID_User =".$id."";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cambiar Privilegios</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../CSS/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
		<link rel="stylesheet" href="../../CSS/main.css">
	</head>
	<body class="full-cover-background" style="background-image:url(../../assets/img/font-login.jpg);">
		<div class="container">
		<div class="form__top">
			<h2><span>Cambiar Privilegios</span></h2>
		</div>		
		<form class="form__reg" id="form" action="cambiarprivilegios.php?id=<?php echo $id;?>" method="post">
		<?php
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
		?>
			<input class="input" type="text" id="username" name="username" placeholder="Nombre de Usuario" readonly="" required autofocus value="<?php echo $row['Us_User']?>">
			<select class="input" name="privilegio">
		<?php
				if ($row['TipoUsuario']=='Admin') {
		?>	
			<option selected value="Admin">Administrador</option>
			<option value="Usuario">Usuario Comun</option>
			<option value="Baneado">Baneado</option>

		<?php
				}elseif ($row['TipoUsuario']=='Usuario') {		
		?>
			<option value="Admin">Administrador</option>
			<option selected value="Usuario">Usuario Comun</option>
			<option value="Baneado">Baneado</option>

		<?php
				}elseif ($row['TipoUsuario']=='Baneado') {
		?>
			<option value="Admin">Administrador</option>
			<option value="Usuario">Usuario Comun</option>
			<option selected value="Baneado">Baneado</option>
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
		</form>
		</div>
	</body>
</html>