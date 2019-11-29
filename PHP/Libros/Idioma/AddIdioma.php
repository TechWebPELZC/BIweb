<?php
require_once('../../conn.php');
$idlibro=$_REQUEST['idlibro'];
$idioma=$_POST['idioma'];


$sql= "INSERT INTO bk_idiobook(ID_Idioma, ID_Libro) VALUES('$idioma', '$idlibro')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>
<script>
	alert('Idioma Anexado');
	location.href='../Autor/AptrAutor.php?idlibro=<?php echo $idlibro; ?>';
</script>

<?php

$conn->close();

?>

