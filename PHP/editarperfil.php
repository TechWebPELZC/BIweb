<?php
session_start();
  if (!isset($_SESSION['usuario'])) {
      header('Location: ../Ingresar.php');
    }else {
      if ($_SESSION['usuario']['TipoUsuario'] != "Usuario") {
      header('Location: ../Ingresar.php');
    }
  }

  $id = $_GET['id'];
  $consulta=Consultausuario($id);

  function Consultausuario($id_li)
  {
  	require_once('conn.php');
    $sql="SELECT * FROM b_users WHERE ID_User='".$id_li."' ";
    $result= $conn->query($sql) or die ("Error al consultar la tabla: ".mysqli_error($conn)); 
    $row= $result->fetch_assoc();
    return [
      $row['ID_User'],
      $row['AP_User'],
      $row['AM_User'],
      $row['Nom_User'],
      $row['Us_User'],
      $row['Email'],
      $row['F_nacimiento'],
      $row['Sexo'],
      $row['Actividad'],
    ]; 
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Actualizar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/Estilos.css">
    <link rel="shortcut icon" href="../assets/icons/book.ico" />
  </head>
    <script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz-+:";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }

    function limpia() {
        var val = document.getElementById("miInput").value;
        var tam = val.length;
        for(i = 0; i < tam; i++) {
            if(!isNaN(val[i]))
                document.getElementById("miInput").value = '';
        }
    }
 </script>
  <body class="full-cover-background" style="background-image:url(../assets/img/font-login.jpg);">
    <div class="container">
    <div class="form__top">
      <h2><span>Actualizar Datos</span></h2>
    </div>    
    <form class="form__reg" id="form" action="actualizado.php?idu=<?php echo $id;?>" method="post" enctype="multipart/form-data">
          <input class="input" type="text" id="username" name="username" placeholder="Nombre de Usuario" readonly="" required autofocus value="<?php echo $consulta[4]?>">
          <input class="input" type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="nombre" name="nombre" placeholder="Nombre" required autofocus value="<?php echo $consulta[3]?>">
          <input class="input" type="text" id="AP" name="AP" placeholder="Apellido paterno" required autofocus value="<?php echo $consulta[1]?>">
          <input class="input" type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="AM" name="AM" placeholder="Apellido Materno" required autofocus value="<?php echo $consulta[2]?>">
          <input class="input" type="text" id="email" name="email" placeholder="E-mail" required autofocus value="<?php echo $consulta[5]?>">
          <input class="input" type="date" id="fecha" name="fecha" placeholder="Fecha de nacimiento" required value="<?php echo $consulta[6]?>">
          <div>
		       Sexo:
		       <br>
		       <?php
		       	if ($consulta[7]=="M") {
		       	?>
		       		Femenino<input type="radio" name="genero" value="F">
		            Masculino<input type="radio" name="genero" value="M" checked>
		       	<?php
		       	} elseif ($consulta[7]=="F") {
		       		?>
		       		Femenino<input type="radio" name="genero" value="F" checked>
		            Masculino<input type="radio" name="genero" value="M">
		       	<?php
		       	}
	     		?> 
	      </div>
	      <br>
	      <div>
		       Actividad:
		       <br>
		       <?php
		       	if ($consulta[8]=="Alumno") {
		       	?>
		       		Alumno<input type="radio" name="actividad" value="Alumno" checked>
		            Profesor<input type="radio" name="actividad" value="Profesor">
		       	<?php
		       	} elseif ($consulta[8]=="Profesor") {
		       		?>
		       		Alumno<input type="radio" name="actividad" value="Alumno">
		            Profesor<input type="radio" name="actividad" value="Profesor" checked>
		       	<?php
		       	}
	     		?> 
	      </div>
          <div class="btn__form">
            <input class="btn__submit" type="submit" onClick="update(<?php echo $row['ID_User']; ?>)" value="Guardar">
            <input class="btn__reset" type="reset" value="Limpiar datos"> 
          </div>
          <center><p><a href="../usuario/PerfilUser.php">Regresar</a></p></center>
    </form>
    </div>
     <script language="javascript">
        function update(upid)
        {
          if(confirm('¿Desea actualizar su informacion de usuario?')){
            window.location.href='actualizado.php?del_id=' +upid+'';
            return true;
          }
        }   
    </script>

  </body>
</html>
