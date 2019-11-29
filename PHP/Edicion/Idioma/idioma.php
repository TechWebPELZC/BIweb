<?php
require_once('../../conn.php');

$idlibro=$_REQUEST['idlibro'];
$idioma=$_POST['idioma'];

$sql= "INSERT INTO idioma_book(Idioma) VALUES('$idioma')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

echo "<script>
	alert('Idioma Ingresado');
	location.href='AptrIdioma.php?idl=".$idlibro."';
</script>";

$conn->close();

?>

