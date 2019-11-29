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

$sql = "SELECT ID_User, CONCAT(Nom_User, ' ', AP_User, ' ', AM_User) AS Nombre, Us_User, Email, Sexo, TipoUsuario FROM b_users WHERE Us_User != '".$_SESSION['usuario']['Us_User']."'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edición de Usuarios</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/Estilos.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/fonts.css">
    <link rel="shortcut icon" href="../../assets/icons/book.ico" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="manifest" href="./../../manifest.json">
 </head>
</head>
<body>
<section class = "contenidotablas">
	<font face="impact" size="5"><h1 align="center">Usuarios</h1></font>
<br>
<br>
<table border="1" align="center" class="tabla_datos" >
<tr>
<th><center>Nombre Completo</center></th>
<th><center>Nombre Usuario</center></th>
<th><center>Correo Electronico</center></th>
<th><center>Genero</center></th>
<th><center>Tipo de Usuario</center></th>
<th><center>-------</center></th>
<th><center>-------</center></th>

</tr>
<?php

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		?>
		<tr>
        <td><?php echo $row['Nombre']; ?></td>
        <td><?php echo $row['Us_User']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <?php
        if ($row['Sexo']== 'M') {        	
        ?>
        <td>Masculino</td>
        <?php
        } elseif ($row['Sexo'] == 'F') {
        ?>
        <td>Femenino</td>
        <?php
        }
        
        ?>

        <td><?php echo $row['TipoUsuario']; ?></td>


        <td><center><a href="../../PHP/Users/privilegios.php?id=<?php echo $row['ID_User'];?>"><button class="btn_table"><span class="icon-unlocked"> Privilegios</span></button></a></center></td>


        <td><center><input type="button" class="btn_table" onClick="deleteme(<?php echo $row['ID_User']; ?>)" name="Delete" value="Eliminar"></center></td>
        </tr>

        <script language="javascript">
		function deleteme(delid)
		{
			if(confirm('¿Desea eliminar a este usuario?')){
				window.location.href='../../PHP/Users/deleteUser.php?del_id=' +delid+'';
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
<center><a href="../UsersAdmin.php"> <button class="btn_dinamico"><span class="icon-reply"> Regresar</span></button></a></center>
</section>
<script src="./../../script.js"></script>
</body>
</html>