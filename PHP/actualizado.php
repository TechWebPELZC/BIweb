<?php
	ModificarUsuario($_POST['nombre'], $_POST['AP'], $_POST['AM'], $_POST['email'],$_POST['fecha'],$_POST['genero'],$_POST['actividad'],$_GET['idu']);
	function ModificarUsuario($nom, $ap, $am, $email, $fecha, $genero, $act, $id_u){
		require_once('conn.php');
		$sentencia= "UPDATE b_users SET Nom_User='".$nom."',AP_User='".$ap."',AM_User='".$am."', Email='".$email."',F_nacimiento='".$fecha."',Sexo='".$genero."', Actividad='".$act."' WHERE ID_User='".$id_u."' ";
		$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));
	}
?>
<script type="text/javascript">
	alert("Informacion modificada");
	window.location.href='../usuario/PerfilUser.php';
</script>