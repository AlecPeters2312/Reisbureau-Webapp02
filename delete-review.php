<?php 
include 'connection.php';
$id = $_POST['review_id'];
$sql = "DELETE FROM reviews WHERE review_id =:review_id";
$prepare =$conn->prepare($sql);
$prepare->bindParam(':review_id', $id);
$prepare->execute();
header("Location: admin.php");