<?php 
include 'connection.php';
$id = $_GET['reisId'];
$sql = "DELETE FROM Reizen WHERE reisId =:id";
$prepare =$conn->prepare($sql);
$prepare->bindParam(':id', $id);
$prepare->execute();
header("Location: admin.php");