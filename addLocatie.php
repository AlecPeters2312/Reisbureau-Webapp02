<?php
include('connection.php');

$land = $_POST['land'];
$stad = $_POST['stad'];






// Insert into reizen table
$sql = "INSERT INTO locaties (land, stad) VALUES (:land, stad)";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':land', $land);
$prepare->bindParam(':stad', $stad);
$prepare->execute();

