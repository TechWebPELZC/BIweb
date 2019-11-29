<?php
	include 'conn.php';

	session_start();
    if (!isset($_SESSION['usuario'])) {
            header('Location: ../Ingresar.php');
        }else {
            if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
            header('Location: ../Ingresar.php');
        }
    }

	$salida = "";
	$query = "SELECT * from b_users WHERE Us_User !='".$_SESSION['usuario']['Us_User']."'";
	if (isset($_POST['consulta'])) {
		$q = $conn -> real_escape_string($_POST['consulta']);
		$query = "SELECT * FROM b_users WHERE Us_User LIKE '%".$q."%' LIMIT 0,100"; 
	}

	$resultado=$conn->query($query);

	$genero = "";

	if ($resultado->num_rows > 0) {
		$salida.="<br><table class='tabla_datos' border = '1'>
					<thread>
						<tr>
							<th><center>Apellido paterno</center></th>
							<th><center>Apellido materno</center></th>
							<th><center>Nombre</center></th>
							<th><center>Username</center></th>
							<th><center>Email</center></th>
							<th><center>Fecha de Nacimiento</th>
							<th><center>Sexo</center></th>
							<th><center>Actividad</center></th>
						</tr>
					</thread>
					<tbody>";

		while ($fila = $resultado -> fetch_assoc()) {
			if ($fila['Sexo']=='M') {
				$genero = 'Masculino';
			} elseif ($fila['Sexo']=='F') {
				$genero = 'Femenino';
			}
			$salida.="<tr>
					<td>".$fila['AP_User']."</td>
					<td>".$fila['AM_User']."</td>
					<td>".$fila['Nom_User']."</td>
					<td>".$fila['Us_User']."</td>
					<td>".$fila['Email']."</td>
					<td>".$fila['F_nacimiento']."</td>
					<td>".$genero."</td>
					<td>".$fila['Actividad']."</td>
				</tr>";
		}

		$salida.="</tbody></table>";

	} else {
		$salida.="No hay datos";

	}

	echo $salida;

	$conn->close();

?>