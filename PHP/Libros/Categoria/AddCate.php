<?php
require_once('../../conn.php');

$idlibro=$_REQUEST['idlibro'];
$categoria=$_POST['idc'];


$sql= "UPDATE b_book SET ID_Categoria = ".$categoria." WHERE ID_Libro = ".$idlibro."";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

$conn->close();

?>

<script>
		alert('Categoria Anexada');
		location.href='../Idioma/AptrIdioma.php?idlibro=<?php echo $idlibro;?>';
</script>