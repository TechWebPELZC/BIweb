<?php
require_once('../../conn.php');

$idl = $_REQUEST['idl'];
$categoria=$_POST['categoria'];

$sql= "INSERT INTO categoria_book(Nom_Categoria) VALUES('$categoria')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>

<script>
	alert('Categoria agregada');
	location.href='AptrCategoria.php?idl=<?php echo $idl; ?>';
</script>

<?php

$conn->close();

?>
