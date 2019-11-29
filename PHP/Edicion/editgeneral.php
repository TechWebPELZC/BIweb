<?php
session_start();
  if (!isset($_SESSION['usuario'])) {
      header('Location: ../Ingresar.php');
    }else {
      if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
      header('Location: ../Ingresar.php');
    }
  }

$idlibro = $_REQUEST['idl'];
$consulta=Consultarlibro($idlibro);

function Consultarlibro($id_li)
  {
  	require_once('../conn.php');
    $sql="SELECT * FROM b_book WHERE ID_Libro='".$id_li."' ";
    $result= $conn->query($sql) or die ("Error al consultar el profesor: ".mysqli_error($conn)); 
    $row= $result->fetch_assoc();
    return [ 
      $row['Titulo_Libro'],     /*0*/
      $row['ISBN'],             /*1*/
      $row['Lugar_Edicion'],    /*2*/
      $row['Edicion'],          /*3*/
      $row['NumPag_libro'],     /*4*/
      $row['Fecha_Edicion'],    /*5*/
    ]; 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Actualizar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/Estilos.css">
    <link rel="shortcut icon" href="../../assets/icons/book.ico" />
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
  <body class="full-cover-background" style="background-image:url(../../assets/img/font-login.jpg);">
    <div class="container">
    <div class="form__top">
      <h2><span>Actualizar Datos</span></h2>
    </div>
    <br>  
    <form class="form__reg" id="form" action="proceso/editgral.php?idl=<?php echo $idlibro;?>" method="post" enctype="multipart/form-data">
          <input class="input" type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="tituloL" name="tituloL" placeholder="Titulo del libro" required autofocus value="<?php echo $consulta[0]?>">
          <input class="input" type="number" id="isbn" name="isbn" placeholder="ISBN" required autofocus value="<?php echo $consulta[1]?>">
          <input class="input" type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="lugar" name="lugar" placeholder="Lugar de edición" required value="<?php echo $consulta[2]?>">
          <input class="input" type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="edicion" name="edicion" placeholder="Edición" required value="<?php echo $consulta[3]?>">
          <input class="input" type="text" id="paginas" name="paginas" placeholder="Número de páginas" required value="<?php echo $consulta[4]?>">
          <input class="input" type="text" id="anioEd" name="anioEd" placeholder="Año de edición" required value="<?php echo $consulta[5]?>">
          <br>
          <input type="file" name="file1" id="file1" accept="images/png, images/jpg">
          <br>
          <div class="btn__form">
            <input class="btn__submit" type="submit" value="Guardar">
            <input class="btn__reset" type="reset" value="Limpiar datos"> 
          </div>
          <br>
          <center>
          <a href="apartadosedit.php?id=<?php echo $idlibro;?>" class="boton_personalizado">Regresar</a>
        </center>
    </form>
    </div>

  </body>
</html>