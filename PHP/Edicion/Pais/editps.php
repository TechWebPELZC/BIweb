<?php
ModificarPais($_POST['pais'],$_GET['idl']);
	function ModificarPais($id_ps, $libro){
		require_once('../../conn.php');
		$sentencia= "UPDATE b_book SET ID_Pais= '".$id_ps."' WHERE ID_Libro='".$libro."' ";
		$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));
	}
?>
<script type="text/javascript">
	alert("Registro Modificado");
	window.location.href='../apartadosedit.php?id=<?php echo $_GET["idl"];?>';
</script>