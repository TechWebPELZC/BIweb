<?php
require_once('../../conn.php');

$idlibro=$_REQUEST['idlibro'];
$edit= $_POST['idedi'];

$sql= "INSERT INTO bk_edibook(ID_Editorial, ID_Libro) VALUES('$edit', '$idlibro')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>

<script>
	alert('Editorial Anexado');
	location.href='../Sinopsis/NvaSinopsis.php?idlibro=<?php echo $idlibro; ?>';
</script>
<?php

$conn->close();

?>
