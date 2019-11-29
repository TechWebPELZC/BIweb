<?php
require_once('../../conn.php');

$categoria=$_POST['categoria'];

$sql= "INSERT INTO categoria_book(Nom_Categoria) VALUES('$categoria')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

echo "<script>
	alert('Categoria agregada');
	location.href='../InsertLibro.php';
</script>";

$conn->close();

?>
