<?php
EliminarUsuario($_REQUEST['del_id']);
	function EliminarUsuario($iduser){
		require_once('../conn.php');
		$sentencia= "DELETE from b_users where ID_User='".$_GET['del_id']."' ";
		$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));
	}

header ("Location: ../../admin/EditarPrivilegios.php");
?>