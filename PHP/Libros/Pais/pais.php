<?php
require_once('../../conn.php');

$pais=$_POST['pais'];

$sql= "INSERT INTO pais_book(Pais) VALUES('$pais')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

$conn->close();

?>

<script>
	alert('Pais agregado');
	location.href='../InsertLibro.php';
</script>