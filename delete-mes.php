<?php 
include 'connection.php';
$id = $_POST['berichtid'];
$sql = "DELETE FROM berichten WHERE berichtid =:id";
$prepare =$conn->prepare($sql);
$prepare->bindParam(':id', $id);
$prepare->execute();
header("Location: admin.php");