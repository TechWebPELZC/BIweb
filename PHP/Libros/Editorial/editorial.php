<?php
require_once('../../conn.php');
$idlibro = $_REQUEST['idlibro'];
$editorial=$_POST['editorial'];


$sql= "INSERT INTO editorial_book(Nom_Editorial) VALUES('$editorial')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>

<script>
	alert('Editorial Ingresado');
	location.href='AgregarEditorial.php?idlibro=<?php echo $idlibro; ?>';
</script>

<?php

$conn->close();

?>
