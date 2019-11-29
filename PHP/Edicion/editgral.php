<?php

$idli = $_GET['idl'];
	ModificarLibro($_POST['tituloL'], $_POST['isbn'],$_POST['lugar'],$_POST['edicion'],$_POST['paginas'],$_POST['anioEd'],$_GET['idl']);
	function ModificarLibro($titulo,$isbn,$lugar,$edicion,$paginas,$anioed,$libro){
		require_once('../../conn.php');
		$sentencia= "UPDATE b_book SET Titulo_Libro='".$titulo."',ISBN='".$isbn."',Lugar_Edicion='".$lugar."',Edicion='".$edicion."', NumPag_libro='".$paginas."', Fecha_Edicion='".$anioed."'   WHERE ID_Libro='".$libro."' ";
		$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));
	}
	/*
	ModificarEditorial($_POST['cate'], $_POST['paisb'], $_POST['tituloL'], $_POST['isbn'],$_POST['lugar'],$_POST['edicion'],$_POST['paginas'],$_POST['anioEd']);
	/*
	function ModificarEditorial($nom_edi){
	require_once('conn.php');
	echo $sentencia2= "UPDATE b_book SET Nom_Editorial= '".$nom_edi,."' WHERE ID_Libro='".."' ";
	$conn->query($sentencia2) or die ("Error al actualizar los datos: ".mysqli_error($conn));

	}*/


	if ($_FILES["file1"]["error"] > 0) {
	# code...
	}else{
		include'../../conn.php';
		$nom_archivo=$_FILES['file1']['name'];
		$carpeta = "Imagenes/";
		$ruta= $carpeta.$nom_archivo;
		$rutafinal= "../../../".$carpeta.$nom_archivo;
		$archivo=$_FILES['file1']['tmp_name'];
		$subir=move_uploaded_file($archivo, $rutafinal);
		$sentencia_img="UPDATE b_book SET Portada = '".$ruta."' WHERE ID_Libro='".$idli."' ";
		$conn-> query($sentencia_img) or die ("Error al subir la imagen:".mysqli_error($conn));

	 }

?>
<script type="text/javascript">
	alert("Registro Modificado");
	window.location.href='../apartadosedit.php?id=<?php echo $_GET["idl"];?>';
</script>