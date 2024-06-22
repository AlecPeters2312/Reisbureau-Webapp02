<?php
include('connection.php');

$comment = $_POST['comment'];
$reisid = $_POST['reisid'];

$sql = "INSERT INTO reviews (comment, reisid) VALUES (:comment, :reisid)";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':comment', $comment);
$prepare->bindParam(':reisid', $reisid);

$prepare->execute();

header("Location: index.php");