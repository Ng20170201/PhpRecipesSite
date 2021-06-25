<?php
include "server/konekcija.php";

$id=$_GET['id'];
$sql = "DELETE FROM receptii WHERE IDRecepta='".$id."'";
echo $sql;
$mysqli->query($sql) or die($sql);

header("Location:unosRecepta.php");
 ?>