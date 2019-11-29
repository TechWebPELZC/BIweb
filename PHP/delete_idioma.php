<?php
include_once("conn.php");
$select = "DELETE from idioma_book where ID_Idioma='".$_GET['del_id']."'";
$query = mysqli_query($conn, $select) or die($select);
header ("Location: ../admin/EdicioLibros/Idioma.php");
?>