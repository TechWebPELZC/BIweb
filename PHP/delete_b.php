<?php
include_once("conn.php");
$select = "DELETE from b_book where ID_Libro='".$_GET['del_id']."'";
$query = mysqli_query($conn, $select) or die($select);
header ("Location: ../admin/EdicioLibros/EditarLibros.php");
?>