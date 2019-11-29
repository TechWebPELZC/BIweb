<?php
require_once('../../conn.php');
$idlibro=$_REQUEST['idlibro'];
$autor=$_POST['idau'];


$sql= "INSERT INTO bk_autorbook(ID_Autor, ID_Libro) VALUES('$autor', '$idlibro')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>
<script>
	alert('Autor Anexado');
	location.href='../Editorial/AptrEditorial.php?idlibro=<?php echo $idlibro; ?>';
</script>

<?php
$conn->close();

?>

