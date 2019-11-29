<?php

	include 'conn.php';

	sleep(2);
	session_start();
		$usu=$_POST['usuariolg'];
		$pass=$_POST['passlg'];
		$fecha_actual = date('Y-m-d h:i:s');
		$usuarios=$conn->query("SELECT ID_User, Nom_User, TipoUsuario, Us_User
                        FROM b_users WHERE Us_User='".$usu."'
                      AND contrab_users='".$pass."'");

		$usuarios2=$conn->query("SELECT fecha_inicio FROM b_users WHERE Us_User='".$usu."' AND contrab_users='".$pass."'");
		if ($usuarios->num_rows==1):
 		 $datos = $usuarios->fetch_assoc();
 		  $_SESSION['usuario'] = $datos;
    	 	echo json_encode(array('error'=>false, 'tipo'=>$datos['TipoUsuario']));
		else:
    		echo json_encode(array('error'=>true));
		endif;

		if ($usuarios->num_rows==1) {
			$usuarios2=$conn->query("SELECT fecha_inicio FROM b_users WHERE Us_User='".$usu."' AND contrab_users='".$pass."'");
			$datos2 = $usuarios2->fetch_assoc();
 		 	$_SESSION['fecha'] = $datos2;
			$conn->query("UPDATE b_users SET fecha_inicio= '".$fecha_actual."'  WHERE Us_User='".$usu."' AND contrab_users='".$pass."'") or die ("Error al actualizar los datos: ".mysqli_error($conn));
		}

	$conn->close();

            /*


				Objetivos de calidad
				objetivos de tiempo
				objetivos de dinero
				ley mexicana de proteccion de datos personales en posicion de particulares

			}*/
?>