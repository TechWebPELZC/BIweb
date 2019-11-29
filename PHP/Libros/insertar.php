<?php
require_once('../conn.php');
$categoria=$_POST['categoria'];
$pais=$_POST['pais'];
$titLi=$_POST['tituloL'];
$isbn=$_POST['isbn'];
$lugar=$_POST['lugar'];
$edicion=$_POST['edicion'];
$paginas=$_POST['paginas'];
$anio=$_POST['anioEd'];
$link=$_POST['link'];
$fecha_actual=date('Y-m-d h:i:s');

if ($_FILES["file1"]["error"] > 0) {
	# code...
}else{
	$nom_archivo=$_FILES['file1']['name'];
	$carpeta = "Imagenes/";
	$ruta= $carpeta.$nom_archivo;
	$rutafinal= "../../".$carpeta.$nom_archivo;
	$archivo=$_FILES['file1']['tmp_name'];
	$subir=move_uploaded_file($archivo, $rutafinal);
	$sentencia="INSERT INTO b_book(ID_Categoria, ID_Pais, Titulo_Libro,ISBN,Lugar_Edicion,Edicion,NumPag_libro,Fecha_Edicion,Portada,Link_book,fecha_ingreso) VALUES('$categoria','$pais','$titLi','$isbn','$lugar','$edicion','$paginas','$anio','$ruta','$link','$fecha_actual')";
	$consulta= $conn-> query($sentencia) or die ("Error al subir la imagen:".$conn->error);

}

header("Location: id.php?isbn=".$isbn."");

#echo "
#		<script>
#			alert('Datos ingresados');
#			location.href='Apartados.php';
#		</script>
#	";
$conn->close();

?>