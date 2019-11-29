<?php
	require '../PHP/conn.php';
	session_start();
	if (!isset($_SESSION['usuario'])) {
			header('Location: ../Ingresar.php');
		}else {
			if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
			header('Location: ../Ingresar.php');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Graficas</title>
		<link rel="stylesheet" type="text/css" href="../CSS/fonts.css">
		<link rel="shortcut icon" href="../assets/icons/book.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

			                  <link rel="stylesheet" type="text/css" href="../CSS/nuevo-menu.css">
    <link rel="stylesheet" href="../CSS/main.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/nuevo-menu.js"></script>
    <link rel="manifest" href="./../manifest.json">
	</head>
	<body>

		<!-- Cabecera -->
		    <header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-menu3"></span>Menú</a>
    </div>
    <center>
      <nav>
      <ul>
          <table>
            <tr>
              <img src="../Imagenes/Logo.png" width = "20%" height="20%">
            </tr>
            <tr>
              <br>
              <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>  
            </tr>
          </table>
        <li><a href="UsersAdmin.php"><span class="icon-users"></span>Usuarios</a></li>
        <li><a href="LibrosAdmin.php"><span class="icon-books"></span>Libros</a></li>
        <li><a href="GraficasAdmin.php"><span class="icon-stats-bars"></span> Graficas</a></a></li>
        <li class="submenu">
          <a href="#"><span class="icon-user"></span>Perfil<span class="caret icon-keyboard_arrow_down"></span></a>
          <ul class="children">
            <li><a href="PerfilUser.php">Mi Perfil <span class="icon-profile"></span></a></li>
            <li><a href="../PHP/cierre.php">Cerrar sesión <span><img src="../Imagenes/cerrar-sesion.png" width="20" height="20"></span></a></li>
          </ul>
        </li>
        
      </ul>
    </nav>
    </center> 
  </header>
         
          <!-- Contenido -->
          <section class="contenido">
          		<br>
               <h1><i><p><center>Bienvenido <?php echo $_SESSION['usuario']['Nom_User']; ?> (<?php echo $_SESSION['usuario']['TipoUsuario']; ?>)</center></p></i></h1>
               <br>
               <h1><i><p><center>Graficas</center></p></i></h1>
               <br>
               <center>
               <input type="button" class="btn_dinamico" name="Mostrar" value="Grfica por Genero" onclick="genero();">
              <input type="button" class="btn_dinamico" name="Mostrar" value="Grafica por Actividad" onclick="actividad();">
              <input type="button" class="btn_dinamico" name="Mostrar" value="Grafica por Cantidad de libros" onclick="cantidad_libros();">
              </center>
              <br>
              <center>

			<script src="../Highcharts-7.2.0/code/highcharts.js"></script>
			<script src="../Highcharts-7.2.0/code/modules/exporting.js"></script>
			<script src="../Highcharts-7.2.0/code/modules/export-data.js"></script>

			<br>
			<div id="container" style="display: none; min-width: 310px; height: 350px; max-width: 500px; margin: 0 auto; margin-top: 20px"></div>



			        <script type="text/javascript">
			Highcharts.chart('container', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: false,
			        type: 'pie'
			    },
			    title: {
			        text: 'Cantidad de personas utilizando el sistema generado por Genero (Masculino y Femenino)'
			    },
			    tooltip: {
			        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            dataLabels: {
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Cantidad de usuarios',
			        colorByPoint: true,
			        data: [

			        <?php  
			            $sql = "SELECT count(ID_User) as Usuarios, sexo FROM b_users WHERE sexo = 'M' or sexo = 'F' group by sexo";
			            $result = $conn->query($sql);
			            while ($row = $result->fetch_assoc()){

			        ?>

			        {name: '<?php echo $row['sexo'];?>', y: <?php echo $row['Usuarios'];?>},

			        <?php
			            }
			        ?>
			      ]
			    }]
			});
			        </script>
			       	
       				<div id="container2" style=" display: none; min-width: 310px; height: 350px; max-width: 500px; margin: 0 auto"></div>

			        <script type="text/javascript">
			Highcharts.chart('container2', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: false,
			        type: 'pie'
			    },
			    title: {
			        text: 'Cantidad de personas utilizando el sistema generado por Actividad (Alumno y Profesor)'
			    },
			    tooltip: {
			        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            dataLabels: {
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Cantidad de usuarios',
			        colorByPoint: true,
			        data: [

			        <?php  
			            $sql = "SELECT count(ID_User) as Usuarios, Actividad FROM b_users WHERE Actividad = 'Alumno' or Actividad = 'Profesor' group by Actividad";
			            $result = $conn->query($sql);
			            while ($row = $result->fetch_assoc()){

			        ?>

			        {name: '<?php echo $row['Actividad'];?>', y: <?php echo $row['Usuarios'];?>},

			        <?php
			            }
			        ?>
			      ]
			    }]
			});
			        </script>
			        
       				<div id="container3" style="display: none; min-width: 310px; height: 350px; max-width: 500px; margin: 0 auto"></div>

			        <script type="text/javascript">
			Highcharts.chart('container3', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: false,
			        type: 'pie'
			    },
			    title: {
			        text: 'Cantidad de libros generado por Categoria'
			    },
			    tooltip: {
			        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            dataLabels: {
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Cantidad de Libros',
			        colorByPoint: true,
			        data: [

			        <?php  
			            $sql = "SELECT count(b.ID_Libro) as libros, c.Nom_categoria from b_book as b inner join categoria_book as c where b.ID_Categoria = c.ID_Categoria group by c.Nom_categoria";
			            $result = $conn->query($sql);
			            while ($row = $result->fetch_assoc()){

			        ?>

			        {name: '<?php echo $row['Nom_categoria'];?>', y: <?php echo $row['libros'];?>},

			        <?php
			            }
			        ?>
			      ]
			    }]
			});
			        </script>			       
			   </center>   
            </section>
            <script src="./../script.js"></script>
            <script type="text/javascript" src="../js/mostrarformulario.js"></script>
	</body>
	</html>