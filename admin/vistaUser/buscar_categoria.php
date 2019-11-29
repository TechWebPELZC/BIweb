<?php

   require '../../PHP/conn.php';
  session_start();
  if (!isset($_SESSION['usuario'])) {
      header('Location: ../../Ingresar.php');
    }else {
      if ($_SESSION['usuario']['TipoUsuario'] != "Admin") {
      header('Location: ../../Ingresar.php');
    }
  }
//Connection for database
include '../../PHP/conn.php';
//Select Database
$categoria = $_REQUEST['categoria'];
              if (empty($categoria)) {
                header("location: Biblioteca.php");
              }  

$sql_register = "SELECT count(*) AS Total FROM b_book WHERE ID_Categoria = $categoria";
$result_register = $conn->query($sql_register);
$row = $result_register->fetch_assoc();
$total_libros = $row['Total'];

$por_pagina = 5;

if (empty($_GET['pagina'])) {
   $pagina = 1;
} else {
   $pagina = $_GET['pagina'];
}

$desde = ($pagina-1) * $por_pagina;
$total_paginas = ceil($total_libros / $por_pagina);

$sql = "SELECT b.ID_Libro, b.ID_Categoria, b.Titulo_Libro, b.Link_book, b.Portada, CONCAT( a.Nom_Autor, ' ', a.AP_Autor, ' ', a.AM_Autor) As Autor, cate.Nom_Categoria As Categoria, idio.Idioma AS idioma FROM b_book AS b INNER JOIN bk_autorbook ON b.ID_Libro = bk_autorbook.ID_Libro INNER JOIN b_autor AS a ON bk_autorbook.ID_Autor = a.ID_Autor INNER JOIN categoria_book AS cate ON b.ID_Categoria = cate.ID_Categoria INNER JOIN bk_idiobook ON b.ID_Libro = bk_idiobook.ID_Libro INNER JOIN idioma_book AS idio ON bk_idiobook.ID_Idioma = idio.ID_Idioma WHERE b.ID_Categoria = $categoria LIMIT $desde,$por_pagina";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM categoria_book";
$result2 = $conn->query($sql2);

$sql3 = "SELECT ID_Autor, CONCAT(Nom_Autor, ' ', AP_Autor, ' ', AM_Autor) As Autor FROM b_autor";
$result3 = $conn->query($sql3);

?>

<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Mi Biblioteca</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/fonts.css">
        <link rel="shortcut icon" href="../../assets/icons/book.ico" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <link rel="stylesheet" type="text/css" href="../../CSS/nuevo-menu.css">
    <link rel="stylesheet" href="../../CSS/main.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../../js/nuevo-menu.js"></script>
    <link rel="manifest" href="./../../manifest.json">
 </head>
</style>
 <body>
    <header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-menu3"></span>Menú</a>
    </div>
    <center>
      <nav>
      <ul>
          <table>
            <tr>
              <img src="../../Imagenes/Logo.png" width = "20%" height="20%">
            </tr>
            <tr>
              <br>
              <th class="title" width = "750" height="60"><i>Biblioteca Informatica Web</i></th>  
            </tr>
          </table>
        <li><a href="InicioU.php"><span class="icon-home3"></span>Inicio</a></li>
        <li><a href="Biblioteca.php"><span class="icon-books"></span>Biblioteca</a></li>
        <li><a href="../LibrosAdmin.php"><img src="../../Imagenes/regresar.png" width="30" height="30"></a></li>
      </ul>
    </nav>
    </center> 
  </header>
          <!-- Contenido -->
          <section class="contenido">
            <br>
          <font face = "Helvetica"><center><h2>Biblioteca Virtual</h2></center></font>
          	<br>
            <br>
        <center>
              <input type="button" class="btn_dinamico" name="Mostrar" value="Buscar por Titulo" onclick="titulo();">
              <input type="button" class="btn_dinamico" name="Mostrar" value="Buscar por Autor" onclick="autor();">
              <input type="button" class="btn_dinamico" name="Mostrar" value="Buscar por Categoria" onclick="categoria();">
              <div id="mostrar_titulo" style="display: none;">
              <form action="buscar_titulo.php" method="get">
              <input type="text" placeholder="Titulo del Libro" name="titulo" id="titulo" class="intext" />
              <input type="submit" value="Buscar" class="btn_search" />
              </form>
              </div>
                <div id="mostrar_categoria" style="display: block;">
                <form action="buscar_categoria.php" method="get">
                <select name="categoria" id="categoria" class="intext">
                    <option value="">Categoria</option>
                <?php
                    if($result2->num_rows > 0){
                      while ($row2 = $result2->fetch_assoc()) {
                        if ($categoria == $row2['ID_Categoria']){
                ?>
                    <option value="<?php echo $row2['ID_Categoria']; ?>" selected><?php echo $row2['Nom_Categoria']; ?></option>
                <?php
                    } else {
                ?>
                    <option value="<?php echo $row2['ID_Categoria']; ?>"><?php echo $row2['Nom_Categoria']; ?></option>
                <?php
                   }  
                
                }
              }
            ?>
          </select>
          <input type="submit" value="Buscar" class="btn_search"/>
            </form>
          </div>
          <div id="mostrar_autor" style="display: none;">
            <form action="buscar_autor.php" method="get">
            <select name="autor" id="busqueda_autor" class="intext">
            <option value="">Autor</option>
            <?php
              if($result3->num_rows > 0){
                while ($row3 = $result3->fetch_assoc()) {
            ?>
            <option value="<?php echo $row3['ID_Autor']; ?>"><?php echo $row3['Autor']; ?></option>
            <?php    
                }
              }
            ?>
          </select>
          <input type="submit" value="Buscar" class="btn_search" />
        </form>
      </div>
        </center>
              <br>
              <br>
              <br>
            <div class="container2">
              <center><table width="70%" align="center" id="central" class="table2">
               <thead> 
                <tr>
                  <th>Portada</th>
                  <th>Libro</th>
                  <th>Autor</th>
                  <th>Categoria</th>
                  <th>Idioma</th>
                  <th>Enlace</th>
                </tr> 
              </thead>
              <tbody>
                   <?php
                    if($result->num_rows > 0){
                      while ($row = $result->fetch_assoc()) {
                   ?>
                   <tr>
                    <?php
                    echo "<td data-label='Portada' height='165'>"; echo "<img src='../../".$row['Portada']."' width = '100' height='150'>"; echo "</td>";?>
                   <td data-label="Titulo" height="100"><a href="../Bibliografia/bibliografia.php?id=<?php echo $row['ID_Libro'];?>"><?php echo $row['Titulo_Libro']; ?></a></td>
                   <td data-label="Autor" height="100"><?php echo $row['Autor']; ?></td>
                   <td data-label="Categoria" height="100"><?php echo $row['Categoria']?></td>
                   <td data-label="Idioma" height="100"><?php echo $row['idioma']?></td>
                   <td data-label="Enlace" height="100"><center><a href="../PHP/TopVer.php?id=<?php echo $row['ID_Libro'];?>&link=<?php echo $row['Link_book'];?>" target="_blank"><button class="boton_personalizado">Leer libro</button></a></center></td>
                 </tr>
                   <?php
                      }
                    }
                    else
                    {
                      ?>
                      <tr>
                        <th colspan="2">No se encuentran datos</th>
                        </tr>
                        <?php
                    }
                    ?>
          </tbody>
    </table>
        </center>
     </div>   
      <div class="paginador">
  <ul>
    <li><a href="?categoria=<?php echo $categoria; ?>&pagina=<?php echo 1;?>" class="newpage">|<</a></li>
    <li><a href="?categoria=<?php echo $categoria; ?>&pagina=<?php echo $pagina-1;?>" class="newpage"><<</a></li>

    <?php
      for ($i=1; $i <= $total_paginas; $i++) { 
        if($i == $pagina){  
        echo "<li class = 'pageSelected'>".$i."</li>";
        } else {  
        echo "<li><a href='?categoria=".$categoria."&pagina=".$i."' class='newpage'>".$i."</a></li>";
        }
      }
    ?>
    <li><a href="?categoria=<?php echo $categoria; ?>&pagina=<?php echo $pagina+1; ?>" class="newpage">>></a></li>
    <li><a href="?categoria=<?php echo $categoria; ?>&pagina=<?php echo $total_paginas; ?>" class="newpage">>|</a></li>
  </ul>
</div>
		</section>
    <script src="./../../script.js"></script>
             <footer>
              <center>Bi Web</center>
              Pagina oficial: <a href="https://jova0411.wixsite.com/techwebpelzc">TechWeb</a>
              Redes sociales: 
              <a href="https://www.facebook.com/TechWebPELZC/" target="_blank" title="Facebook"><img src="../Imagenes/facebook.wix_mp"></a>
              <a href="https://www.instagram.com/techweblzc/?hl=es-la" target="_blank" title="Instagram"><img src="../Imagenes/Instagram.webp"></a>
              <a href="https://twitter.com/TechWebPE_LZC" target="_blank" title="Twitter"><img src="../Imagenes/twitter.webp"></a>
              <a href="https://www.youtube.com/channel/UClhQx2c6LSgtT5f87jC2vxg" target="_blank" title="Youtube"><img src="../Imagenes/youtube.webp"></a>
           </footer>
    <script type="text/javascript" src="../../js/mostrarformulario.js"></script> 
</body>
</html>