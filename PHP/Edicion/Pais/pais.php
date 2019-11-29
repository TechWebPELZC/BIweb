<?php
require_once('../../conn.php');

$idl = $_REQUEST['idl'];
$pais=$_POST['pais'];

$sql= "INSERT INTO pais_book(Pais) VALUES('$pais')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

$conn->close();

?>

<script>
	alert('Pais agregado');
	location.href='AptrPais.php?idl=<?php echo $idl;?>';
</script>