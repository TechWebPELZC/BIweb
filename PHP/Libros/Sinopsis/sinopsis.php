<?php
require_once('../../conn.php');
$idlibro = $_REQUEST['idlibro'];
$sip=$_POST['sinopsis'];

$sql= "INSERT INTO caract_book(Sinopsis) VALUES('$sip')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);

?>
<script>
		alert('Sinopsis Ingresada');
		location.href='AgregarSinopsis.php?idlibro=<?php echo $idlibro; ?>';
</script>

<?php

$conn->close();

?>
