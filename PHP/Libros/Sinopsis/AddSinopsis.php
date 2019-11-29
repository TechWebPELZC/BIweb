<?php
require_once('../../conn.php');
$idlibro=$_REQUEST['idlibro'];
$caract=$_POST['idsi'];


$sql= "INSERT INTO bk_caractbook(ID_Caract, ID_Libro) VALUES('$caract', '$idlibro')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

echo "
<script>
	alert('Registro completo');
	location.href='../../../admin/Libros1.php';
</script>";

$conn->close();

?>
