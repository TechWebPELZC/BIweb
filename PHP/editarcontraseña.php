<?php
session_start();
  if (!isset($_SESSION['usuario'])) {
      header('Location: ../Ingresar.php');
    }else {
      if ($_SESSION['usuario']['TipoUsuario'] != "Usuario") {
      header('Location: ../Ingresar.php');
    }
  }

  $id = $_GET['idc'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Nueva Contraseña</title>
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
    <form class="form__reg" id="form" action="validacioncontraseña.php?idu=<?php echo $id;?>" method="post" enctype="multipart/form-data">
          <input class="input" type="password" name="password" placeholder="&#x1F512;  Ingrese su actual contraseña" required>
          <input class="input" type="password" name="passvl" placeholder="&#x1F512;  Ingresar nueva contraseña" required>
          <input class="input" type="password" name="Rpassvl" placeholder="&#x1F512;  Repetir contraseña" required>
          <div class="btn__form">
            <input class="btn__submit" type="submit" value="Guardar">
            <input class="btn__reset" type="reset" value="Limpiar datos"> 
          </div>
          <center><p><a href="../usuario/PerfilUser.php">Regresar</a></p></center>
    </form>
    </div>
  </body>
</html>