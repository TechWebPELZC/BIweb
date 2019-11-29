<?php
include '../../PHP/conn.php';
    session_start();
    if (!isset($_SESSION['usuario'])) {
            header('Location: ../Ingresar.php');
        }else {
            if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
            header('Location: ../Ingresar.php');
        }
    }

//Connection for database

//Select Database
$sql_register = "SELECT COUNT(*) AS Total FROM `b_book`";
$result_register = $conn->query($sql_register);
$row = $result_register->fetch_assoc();
$total_libros = $row['Total'];

$por_pagina = 10;

if (empty($_GET['pagina'])) {
 $pagina = 1;
} else {
 $pagina = $_GET['pagina'];
}


$desde = ($pagina-1) * $por_pagina;
$total_paginas = ceil($total_libros / $por_pagina);

$sql = "SELECT * FROM b_book LIMIT $desde,$por_pagina";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Edición Libros</title>
        <link rel="stylesheet" href="../../CSS/main.css">
        <link rel="stylesheet" href="../../CSS/Estilos.css">
        <link rel="stylesheet" type="text/css" href="../../CSS/fonts.css">
        <link rel="shortcut icon" href="../../assets/icons/book.ico" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="manifest" href="./../../manifest.json">
 </head>
<body >
          <!-- Contenido -->
<section class="contenidotablas">
<font face="impact" size="5"><h1 align="center">Consulta de libros</h1></font>
<br>
<br>
<table border="1" align="center" class="tabla_datos" >
<tr>
<th><center>Titulo del Libro</center></th>
<th><center>ISBN</center></th>
<th><center>Fecha de Edicion</center></th>
<th><center>Lugar de Edicion</center></th>
<th><center>Edición</center></th>
<th><center>Numero de Paginas</center></th>
<th><center>-------</center></th>
<th><center>-------</center></th>

</tr>
<?php

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		?>
		<tr>
        <td><?php echo $row['Titulo_Libro']; ?></td>
        <td><?php echo $row['ISBN']; ?></td>
        <td><?php echo $row['Fecha_Edicion']; ?></td>
        <td><?php echo $row['Lugar_Edicion']; ?></td>
        <td><?php echo $row['Edicion']; ?></td>
        <td><?php echo $row['NumPag_libro']; ?></td>


        <td><center><a href="../../PHP/Edicion/apartadosedit.php?id=<?php echo $row['ID_Libro'];?>"><button class="btn_table"><span class="icon-document-edit"> Modificar</span></button></a></center></td>


        <td><center><input type="button" class="btn_table" onClick="deleteme(<?php echo $row['ID_Libro']; ?>)" name="Delete" value="Eliminar"></center></td>
        </tr>

        <script language="javascript">
		function deleteme(delid)
		{
			if(confirm('¿Desea eliminar este libro de la base de datos?')){
				window.location.href='../../PHP/delete_b.php?del_id=' +delid+'';
				return true;
			}
		}		
		</script>

        <?php
	}
}

else
{
	?>
	<tr>
    <th colspan="2">There's No data found!!!</th>
    </tr>
    <?php
}
?>
</table>
<div class="paginador">
    <ul>
      <li><a href="?pagina=<?php echo 1;?>" class="newpage">|<</a></li>
      <li><a href="?pagina=<?php echo $pagina-1;?>" class="newpage"><<</a></li>

      <?php
        for ($i=1; $i <= $total_paginas; $i++) { 
          if($i == $pagina){  
          echo "<li class = 'pageSelected'>".$i."</li>";
          } else {  
          echo "<li><a href='?pagina=".$i."' class='newpage'>".$i."</a></li>";
          }
        }
      ?>
      <li><a href="?pagina=<?php echo $pagina+1; ?>" class="newpage">>></a></li>
      <li><a href="?pagina=<?php echo $total_paginas; ?>" class="newpage">>|</a></li>
    </ul>
  </div>
<br>
<br>
<center>
    <a class="boton_personalizado" href="Autores.php"><span class="icon-user-tie"> Autores</span></a>
    <a class="boton_personalizado" href="Idiomas.php"><span class="icon-bubble"> Idiomas</span></a>
    <a class="boton_personalizado" href="Editoriales.php"><span class="icon-office"> Editoriales</span></a>
</center>
<br>
<br>
        <center>
            <a class="boton_personalizado" href="../LibrosAdmin.php"><span class="icon-reply"> Regresar</span></a>
        </center>
</section>
<script src="./../../script.js"></script>
<footer>
                <center>Bi Web</center>
</footer>
</body>
</html>