<?php
require_once('../../conn.php');
$idlibro=$_REQUEST['idlibro'];
$autor=$_POST['idau'];


$sql= "UPDATE bk_autorbook SET ID_Autor = $autor WHERE ID_Libro = $idlibro";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>
<script>
	alert('Autor Editado');
	location.href='../apartadosedit.php?id=<?php echo $idlibro; ?>';
</script>

<?php
$conn->close();

?>

