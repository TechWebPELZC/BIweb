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
$sql = "SELECT * FROM editorial_book";
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
<font face="impact" size="5"><h1 align="center">Consulta de Idiomas</h1></font>
<br>
<br>
<table border="1" align="center" class="tabla_datos" >
<tr>
<th><center>Editoriales</center></th>
<th><center>-------</center></th>

</tr>
<?php

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		?>
		<tr>
        <td><?php echo $row['Nom_Editorial']; ?></td>
        <td><center><input type="button" class="btn_table" onClick="deleteme(<?php echo $row['ID_Editorial']; ?>)" name="Delete" value="Eliminar"></center></td>
        </tr>

        <script language="javascript">
		function deleteme(delid)
		{
			if(confirm('¿Desea eliminar este libro de la base de datos?')){
				window.location.href='../../PHP/delete_editorial.php?del_id=' +delid+'';
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
<br>
<br>
         <center>
    <a class="boton_personalizado" href="EditarLibros.php"><span class="icon-book"> Libros</span></a>
    <a class="boton_personalizado" href="Autores.php"><span class="icon-user-tie"> Autores</span></a>
    <a class="boton_personalizado" href="Idiomas.php"><span class="icon-bubble"> Idiomas</span></a>
</center>
<br>
<br>
        <center>
            <a class="boton_personalizado" href="../LibrosAdmin.php"><span class="icon-reply"> Regresar</span></a>
        </center>
        <br>
<br>
</section>
<script src="./../../script.js"></script>
<footer>
                <center>Bi Web</center>
</footer>
</body>
</html>