<?php
require_once('../../conn.php');

$idlibro=$_REQUEST['idlibro'];
$edit= $_POST['idedi'];

$sql= "UPDATE bk_edibook SET ID_Editorial = $edit WHERE ID_Libro = $edit";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>

<script>
	alert('Editorial Editado');
	location.href='../apartadosedit.php?id=<?php echo $idlibro; ?>';
</script>
<?php

$conn->close();

?>
