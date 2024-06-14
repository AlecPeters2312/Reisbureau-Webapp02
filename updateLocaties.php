<?php
include('connection.php');

$land = $_POST['land'];
$stad = $_POST['stad'];
$lid = $_POST['id'];
// Insert into reizen table
$sql = "UPDATE locaties  SET land = :land, stad = :stad WHERE locatieid = :lid";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':land', $land);
$prepare->bindParam(':stad', $stad);
$prepare->bindParam(':lid', $lid);
$prepare->execute();
header("Location: admin.php");

