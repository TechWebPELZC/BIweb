<?php

ModificarCategoria($_POST['cate'],$_GET['idl']);
	function ModificarCategoria($id_ca, $libro){
		require_once('../../conn.php');
		$sentencia= "UPDATE b_book SET ID_Categoria= '".$id_ca."' WHERE ID_Libro='".$libro."' ";
		$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));
	}
?>
<script type="text/javascript">
	alert("Registro Modificado");
	window.location.href='../apartadosedit.php?id=<?php echo $_GET["idl"];?>';
</script>