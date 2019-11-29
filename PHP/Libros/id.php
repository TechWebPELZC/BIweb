<?php
include '../conn.php';

$isbn = $_REQUEST['isbn'];

$sql = "SELECT * FROM b_book WHERE ISBN = ".$isbn."";
$result = $conn->query($sql);
$row = $result->fetch_assoc()

?>

"<script>
	alert('Datos ingresados');
	location.href='Idioma/AptrIdioma.php?idlibro=<?php echo $row['ID_Libro']; ?>';
</script>"