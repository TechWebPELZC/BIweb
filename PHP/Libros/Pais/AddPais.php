<?php
require_once('../../conn.php');

$idlibro=$_REQUEST['idlibro'];
$pais=$_POST['idp'];


$sql= "UPDATE b_book SET ID_Pais = ".$pais." WHERE ID_Libro = ".$idlibro."";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

$conn->close();

?>

<script>
		alert('Pais Anexado');
		location.href='AptrIdioma.php?idlibro=<?php echo $idlibro;?>';
</script>