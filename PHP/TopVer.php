<?php
	include 'conn.php';
	session_start();
    $fecha_actual = date('Y-m-d h:i:s');
	$id_user = $_SESSION['usuario']['ID_User'];
	$id_libro = $_GET["id"];
	$link_lib = $_GET["link"];
	

    $sql1 = "SELECT * from b_topvistas WHERE ID_Libro = '".$id_libro."' AND ID_User = '".$id_user."'";
    $result1 = $conn->query($sql1);

    $sql2 = "SELECT sum(No_vistas) as suma from b_topvistas WHERE ID_Libro = '".$id_libro."' AND ID_User = '".$id_user."' group by ID_Libro order by No_vistas";
    $result2 = $conn->query($sql2);
   

	if ($result1->num_rows > 0) {
		if (isset($_SESSION['fecha']) ) {
			$minutos = (strtotime($fecha_actual)-strtotime($_SESSION['fecha']))/60;
				$minutos = abs($minutos); 
				$minutos = floor($minutos);
				if ($minutos > 30) {
					$_SESSION['fecha'] = $fecha_actual;
					$fecha = $_SESSION['fecha'];
					while ($row = $result2->fetch_assoc()) {
						$sentencia= "UPDATE b_topvistas SET fecha_hora= '".$fecha."', No_vistas = '".$row['suma']."'+1  WHERE ID_Libro='".$id_libro."' AND ID_User= '".$id_user."'";
					$conn->query($sentencia) or die ("Error al actualizar los datos: ".mysqli_error($conn));

					}
					
				}
		}
	}else{
			mysqli_query($conn, "INSERT INTO b_topvistas(ID_Libro,ID_User,No_vistas,fecha_hora) VALUES('$id_libro','$id_user','1','$fecha_actual')") or die('<h2>Error Guardando los datos: </h2>'.mysqli_error($conn));
		}
		header("location: ".$link_lib."");	
	
	
?>