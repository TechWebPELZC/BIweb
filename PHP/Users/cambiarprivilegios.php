<?php
	ModificarPrivilegios($_GET['id'],$_POST['privilegio']);
	function ModificarPrivilegios($iduser,$privilegio){
		require_once('../conn.php');
		$sentencia= "UPDATE b_users SET TipoUsuario= '".$privilegio."' WHERE ID_User='".$iduser."' ";
		$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));
	}
?>
<script type="text/javascript">
	alert("Usuario Editado");
	window.location.href='../../admin/EditarPrivilegios.php'; 
</script>
