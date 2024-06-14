<?php
include 'connection.php';
$afbeelding = $_POST['afbeelding'];
$id = $_POST['reisId'];

// Prepare the SQL statement
$sql = "UPDATE reizen SET  img = :afbeelding WHERE reisid = :id";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':id', $id);
$prepare->bindParam(':afbeelding', $afbeelding);

$result = $prepare->execute();
header("Location: admin.php");

