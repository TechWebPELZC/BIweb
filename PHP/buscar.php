<?php
	include 'conn.php';

	$salida = "";
	
	$query = "SELECT b.*, CONCAT( c.Nom_Autor, ' ', c.AP_Autor, ' ', c.AM_Autor) As Autor, d.Idioma FROM b_book AS b INNER JOIN bk_autorbook ON b.ID_Libro = bk_autorbook.ID_Libro INNER JOIN b_autor AS c ON  bk_autorbook.ID_Autor = c.ID_Autor inner join bk_idiobook ON bk_idiobook.ID_Libro = b.ID_Libro inner join idioma_book AS d ON d.ID_Idioma = bk_idiobook.ID_Idioma LIMIT 0,10";

	if (isset($_POST['consulta'])) {
		$q = $conn -> real_escape_string($_POST['consulta']);
		$query = "SELECT b.*, CONCAT( c.Nom_Autor, ' ', c.AP_Autor, ' ', c.AM_Autor) As Autor, d.Idioma FROM b_book AS b INNER JOIN bk_autorbook ON b.ID_Libro = bk_autorbook.ID_Libro INNER JOIN b_autor AS c ON  bk_autorbook.ID_Autor = c.ID_Autor inner join bk_idiobook ON bk_idiobook.ID_Libro = b.ID_Libro inner join idioma_book AS d ON d.ID_Idioma = bk_idiobook.ID_Idioma  WHERE Titulo_Libro LIKE '%$q%' OR Nom_Autor LIKE '%$q%' LIMIT 0,10"; 
	}

	$resultado=$conn->query($query);

	if ($resultado->num_rows > 0) {
		$salida.="<br><table class='tabla_datos' border = '1'>
					<thread>
						<tr>
							<th><center>Titulo del Libro</center></th>
							<th><center>ISBN</center></th>
							<th><center>Fecha de Edicion</center></th>
							<th><center>Lugar de Edicion</center></th>
							<th><center>Edicion</center></th>
							<th><center>Numero de Paginas</center></th>
							<th><center>Autor</center></th>
							<th><center>Idioma</center></th>
						</tr>
					</thread>
					<tbody>";

		while ($fila = $resultado -> fetch_assoc()) {
			$salida.="<tr>
					<td>".$fila['Titulo_Libro']."</td>
					<td>".$fila['ISBN']."</td>
					<td>".$fila['Fecha_Edicion']."</td>
					<td>".$fila['Lugar_Edicion']."</td>
					<td>".$fila['Edicion']."</td>
					<td>".$fila['NumPag_libro']."</td>
					<td>".$fila['Autor']."</td>
					<td>".$fila['Idioma']."</td>
				</tr>";
		}

		$salida.="</tbody></table>";

	} else {
		$salida.="No hay datos";

	}

	echo $salida;

	$conn->close();
	
?>
