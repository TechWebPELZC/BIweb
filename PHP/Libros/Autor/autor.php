<?php
require_once('../../conn.php');
$idlibro=$_REQUEST['idlibro'];
$nombre=$_POST['name'];
$apaterno=$_POST['ap'];
$amaterno=$_POST['am'];
$nacionalidad=$_POST['nacionalidad'];


$sql= "INSERT INTO b_autor(Nom_Autor, AP_Autor, AM_Autor, Nacionalidad) VALUES('$nombre','$apaterno','$amaterno','$nacionalidad')";

$consulta= $conn-> query($sql) or die ("Error:".$conn->error);
?>

<script>
	alert('Autor Ingresado');
	location.href='AgregarAutor.php?idlibro=<?php echo $idlibro; ?>';
</script>

<?php
$conn->close();

?>