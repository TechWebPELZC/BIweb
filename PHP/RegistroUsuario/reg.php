<?php
	include '../conn.php';

	$sql = "SELECT * FROM b_users";
	$result = $conn->query($sql);


	$APaterno = $_POST['AP'];
	$AMaterno = $_POST['AM'];
	$nombre = $_POST['nombre'];
	$email = $_POST['mail'];
	$user = $_POST['nombreusuario'];
	$nac = $_POST['dateb'];
	$tipo = 'Usuario';
	$password = $_POST['pass'];
	$Rpassword = $_POST['Rpass'];

	if ($_POST) {
		$gender = $_POST['genero'];
		$act = $_POST['actividad'];
		$error_encontrado="";
	}


function validar_clave($clave,&$error_clave){
   if(strlen($clave) < 5){
      $error_clave = "La clave debe tener al menos 6 caracteres";
      return false;
   }
   if(strlen($clave) > 16){
      $error_clave = "La clave no puede tener más de 16 caracteres";
      return false;
   }
   if (!preg_match('`[a-z]`',$clave)){
      $error_clave = "La clave debe tener al menos una letra minúscula";
      return false;
   }
   if (!preg_match('`[A-Z]`',$clave)){
      $error_clave = "La clave debe tener al menos una letra mayúscula";
      return false;
   }
   if (!preg_match('`[0-9]`',$clave)){
      $error_clave = "La clave debe tener al menos un caracter numérico";
      return false;
   }
   $error_clave = "";
   return true;
}

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		if ($user==$row['Us_User']) {
			echo "
			<script>
				alert('Este nombre de usuario ya esta en uso');
				location.href='../../Registrar.php';
			</script>";
		} elseif (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $email)) {
  	echo "<script>
			alert('La dirección de correo electronico es invalida');
			location.href='../../Registrar.php';
		</script>";
}elseif ($email==$row['Email']) {
	echo "<script>
			alert('La dirección de correo electronico ya fue registrada por otro usuario');
			location.href='../../Registrar.php';
		</script>";
}elseif ($password != $Rpassword) {
		echo "<script>
			alert('Las contraseñas no coinciden');
			location.href='../../Registrar.php';
		</script>";
}else {    

   if (validar_clave($password, $error_encontrado)){
      mysqli_query($conn, "INSERT INTO b_users(AP_User,AM_User,Nom_User,Us_User,Email,F_nacimiento,Sexo,contrab_users,Actividad,TipoUsuario) VALUES('$APaterno','$AMaterno','$nombre','$user','$email','$nac','$gender','$password', '$act', '$tipo')") or die('<h2>Error Guardando los datos: </h2>'.mysqli_error($conn));


	echo "
		<script>
			alert('Registro Exitoso');
			location.href='../../Ingresar.php';
		</script>
	";

	mysqli_close($conn);
	
   }else{

   	?>
     <script>
      	alert('Password invalido <?php echo $error_encontrado;?>')
      	location.href='../../Registrar.php';
     </script>

      <?php
      mysqli_close($conn);
   		}
		}
	}
}
	
	?>