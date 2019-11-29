<?php
	include 'conn.php';

	$id = $_GET['idu'];
	$realpass = $_POST['password'];
	$newpass = $_POST['passvl'];
	$Rnewpass = $_POST['Rpassvl'];

	$result = mysqli_query($conn, "SELECT contrab_users FROM b_users WHERE ID_User = '".$id."'");

	if ($realpass != $result && $newpass != $Rnewpass) {
		echo "<script>
			alert('Error en el ingreso de datos');
			location.href='editarcontraseña.php?idc=<?php echo $id;?>';
		</script>";
	} else {
		header("Location: nuevacontra.php?idus=".$id."&pass=".$newpass."");
	} 

?>
	
