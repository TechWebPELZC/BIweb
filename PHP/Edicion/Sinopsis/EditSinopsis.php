<?php
require_once('../../conn.php');
$idlibro=$_REQUEST['idlibro'];
$sinopsis=$_REQUEST['sinopsis'];
$idsinopsis=$_REQUEST['ids'];

$sqls = "UPDATE caract_book SET Sinopsis = '$sinopsis' WHERE ID_Caract = $idsinopsis";
$conn->query($sqls) or die ("Error al actualizar los datos: ".mysqli_error($conn));

?>
<script>
	alert('Sinopsis Editada');
	location.href='../apartadosedit.php?id=<?php echo $idlibro; ?>';
</script>

<?php

$conn->close();

?>
