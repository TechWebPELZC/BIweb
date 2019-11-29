<?php
require_once('../../conn.php');
$idlibro=$_REQUEST['idlibro'];
$idioma=$_POST['idioma'];


$sql= "UPDATE bk_idiobook SET ID_Idioma = $idioma WHERE ID_Libro = $idlibro";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>
<script>
	alert('Idioma Editado');
	location.href='../apartadosedit.php?id=<?php echo $idlibro; ?>';
</script>

<?php

$conn->close();

?>

