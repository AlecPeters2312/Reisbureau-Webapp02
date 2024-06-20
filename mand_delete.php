<?php
include('connection.php');
$id = $_POST['boekid'];
$sql = "DELETE FROM boekingen WHERE boekingsId = :id";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':id',$id);
$prepare->execute();

header("Location: mand.php");