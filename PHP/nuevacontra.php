<?php
	ModificarContraseña($_GET['pass'],$_GET['idus']);
	function ModificarContraseña($pass,$id_us){
		require_once('conn.php');
		$sentencia= "UPDATE b_users SET contrab_users= '".$pass."' WHERE ID_User='".$id_us."' ";
		$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));
	}
?>
<script type="text/javascript">
	alert("Contraseña editada correctamente");
	window.location.href='../usuario/PerfilUser.php'; 
</script>