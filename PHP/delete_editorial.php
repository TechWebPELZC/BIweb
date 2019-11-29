<?php
include_once("conn.php");
$select = "DELETE from editorial_book where ID_Editorial='".$_GET['del_id']."'";
$query = mysqli_query($conn, $select) or die($select);
header ("Location: ../admin/EdicioLibros/Editoriales.php");
?>