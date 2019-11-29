<?php

  session_start();
  if (!isset($_SESSION['usuario'])) {
      header('Location: ../Ingresar.php');
    }else {
      if ($_SESSION['usuario']['TipoUsuario'] != "Usuario") {
      header('Location: ../Ingresar.php');
    }
  }

$idlibro = $_REQUEST['id'];
$consulta=Consulta($idlibro);

function Consulta($id_li){
require_once('../PHP/conn.php');
//Select Database
$sql = "SELECT b.ID_Libro, b.Titulo_Libro, b.ISBN, b.Fecha_Edicion, b.Lugar_Edicion, b.Edicion, b.NumPag_libro, b.Portada, CONCAT( a.Nom_Autor, ' ', a.AP_Autor, ' ', a.AM_Autor) As Autor FROM b_book AS b INNER JOIN bk_autorbook ON b.ID_Libro = bk_autorbook.ID_Libro INNER JOIN b_autor AS a ON bk_autorbook.ID_Autor = a.ID_Autor WHERE b.ID_Libro ='".$id_li."' ";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM b_book AS b INNER JOIN categoria_book AS cate ON b.ID_Categoria = cate.ID_Categoria WHERE b.ID_Libro = '".$id_li."' ";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM b_book AS b INNER JOIN bk_caractbook AS caract ON b.ID_Libro = caract.ID_Libro INNER JOIN caract_book AS c ON caract.ID_Caract = c.ID_Caract WHERE b.ID_Libro = '".$id_li."' ";
$result3 = $conn->query($sql3);

$sql4 = "SELECT * FROM b_book AS b INNER JOIN bk_idiobook ON b.ID_Libro = bk_idiobook.ID_Libro INNER JOIN idioma_book AS idio ON bk_idiobook.ID_Idioma = idio.ID_Idioma WHERE b.ID_Libro = '".$id_li."' ";
$result4 = $conn->query($sql4);

$sql5 = "SELECT * FROM b_book AS b INNER JOIN pais_book AS p ON b.ID_Pais = p.ID_Pais WHERE b.ID_Libro = '".$id_li."' ";
$result5 = $conn->query($sql5);

$sql6 = "SELECT * FROM b_book AS b INNER JOIN bk_edibook ON b.ID_Libro = bk_edibook.ID_Libro INNER JOIN editorial_book AS edit ON bk_edibook.ID_Editorial = edit.ID_Editorial WHERE b.ID_Libro = '".$id_li."' ";
$result6 = $conn->query($sql6);


$row = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();
$row3 = $result3->fetch_assoc();
$row4 = $result4->fetch_assoc();
$row5 = $result5->fetch_assoc();
$row6 = $result6->fetch_assoc();

return[
	$row['Autor'],                  /*0*/
	$row['Titulo_Libro'],           /*1*/
	$row['ISBN'],                   /*2*/
	$row['Fecha_Edicion'],          /*3*/
	$row['Lugar_Edicion'],          /*4*/
	$row['Edicion'],                /*5*/
	$row['NumPag_libro'],           /*6*/         
	$row2['Nom_Categoria'],         /*7*/
	$row3['Sinopsis'],              /*8*/
	$row4['Idioma'],                /*9*/
	$row5['Pais'],                  /*10*/
	$row6['Nom_Editorial'],         /*11*/
	$row2['Link_book'],               /*12*/
	$row['Portada'],
	$row['ID_Libro']
];
}

?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Bibliografia</title>
        <link rel="stylesheet" type="text/css" href="../CSS/nuevo-menu.css">
        <link rel="stylesheet" href="../CSS/main.css">
        <link rel="stylesheet" type="text/css" href="../CSS/fonts.css">
        <link rel="shortcut icon" href="../assets/icons/book.ico" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<style type="text/css">
  .boton_1{
    text-decoration: none;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 25px;
    font-style: italic;
    color: #ffffff;
    background-color: #141313;
    border-radius: 15px;
    border: 3px double #565252;
  }
  .boton_1:hover{
    opacity: 0.6;
    text-decoration: none;
  }
</style>
<body>
		  <!-- <header class="header2">
                 <div class="wrapper">
                    <div class="logo"><img src="../Imagenes/Logo.png"></div>
                      <table>
                      <tr>
                        <br>
                        <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>  
                        <th class="sesion" width = "10" height="10"><a href="../PHP/cierre.php" title="Cerrar Sesion"><img src="../Imagenes/cerrar-sesion.png"></a></th>
                      </tr>
                    </table>
                    <nav>
						<a href="../usuario/InicioU.php"><span class="icon-home3"></span> Inicio</a>
						<a href="../usuario/Biblioteca.php"><span class="icon-books"></span> Biblioteca</a>
						<a href="../usuario/PerfilUser.php"><span class="icon-user"></span> Mi perfil</a>
						<a href="../usuario/historial.php"><span><img src="../Imagenes/historia.png"></span> Historial de libros</a>
					</nav>
                </div>
          </header> -->
          <!-- Contenido -->
          <section >
          	<br>
          	<br>
          	<center><h2>Bibliografía</h2></center>
          	<br>
          	<center><?php
		          echo "<td>"; echo "<img src='../".$consulta[13]."' width = '200' height='250'>"; echo "</td>";

          ?></center>
          	<br>
				<div class="table-container">
				<center><table width="80%" border="0" align="center" cellpadding="2" cellspacing="2" class="table-rwd">
					<tbody>
						<tr valign="top">
							<td width="100" height="25" bgcolor="#252932">
								<table width="80%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Autor(es):</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td width="*" bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[0]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<span>
													<center><span style="color:white;">Título del Libro:</span></center>
												</span>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[1]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="5%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Sinopsis:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra"><?php echo $consulta[8]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">ISBN:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[2]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Editorial:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[11]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Edición:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[5]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Fecha de Edición:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[3]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Lugar de Edición:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[4]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Pais:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[10]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Idioma:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[9]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Número de Páginas:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[6]?></span>
							</td>
						</tr>
						<tr valign="top">
							<td height="25" bgcolor="#252932">
								<table width="96%" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<center><span style="color:white;">Categoria:</span></center>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td bgcolor="#FF9191">
								<span class="tipoletra">&nbsp<?php echo $consulta[7]?></span>
							</td>
						</tr>
					</tbody>
				</table></center>
			</div>
				<br>
				<br>
				<center><a href="../PHP/TopVer.php?id=<?php echo $consulta[14];?>&link=<?php echo $consulta[12];?>" class = "boton_1" target = "_blank" >Leer libro</a></center>
				<br>
				<center><a href="../usuario/Biblioteca.php" class="boton_1">Regresar</a></center>
				<br>
				<br>
          </section>
</body>
</html>