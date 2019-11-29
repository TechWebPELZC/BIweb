<?php
	include '../../PHP/conn.php';

	$sql = "SELECT * FROM b_users";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$APaterno = $_POST['AP'];
	$AMaterno = $_POST['AM'];
	$nombre = $_POST['nombre'];
	$email = $_POST['mail'];
	$user = $_POST['nombreusuario'];
	$nac = $_POST['dateb'];
	$password = $_POST['pass'];
	$Rpassword = $_POST['Rpass'];


	if ($_POST) {
		$gender = $_POST['genero'];
		$act = $_POST['actividad'];
		$tipo = $_POST['tipo'];
	}

	function validar_clave($clave,&$error_clave){
   if(strlen($clave) < 6){
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

if ($password != $Rpassword) {
		echo "<script>
			alert('Las contraseñas no coinciden');
			location.href='../Registrar.php';
		</script>";
	}

	if ($_POST){
   $error_encontrado="";
   if (validar_clave($password, $error_encontrado)){
      mysqli_query($conn, "INSERT INTO b_users(AP_User,AM_User,Nom_User,Us_User,Email,F_nacimiento,Sexo,contrab_users,Actividad,TipoUsuario) VALUES('$APaterno','$AMaterno','$nombre','$user','$email','$nac','$gender','$password', '$act', '$tipo')") or die('<h2>Error Guardando los datos: </h2>'.mysqli_error($conn));


	echo "
		<script>
			alert('Registro Exitoso');
			location.href='../Ingresar.php';
		</script>
	";

	mysqli_close($conn);
	
   }else{

   	?>
     	<script>
      	alert('Password invalido <?php echo $error_encontrado;?>')
      	location.href='RegistrarAdmin.php';
      </script>

      <?php
      mysqli_close($conn);
   }
}

	
	?>