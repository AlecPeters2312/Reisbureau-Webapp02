<?php
include ('connection.php');
$id = $_POST['boekid'];
$sql = "DELETE FROM boekingen WHERE boekingsId = :id";
$prepare = $conn->prepare($sql);
$prepare->bindParam(':id', $id);
$prepare->execute();

if ($_SERVER['REQUEST_URI'] == "admin.php") {
    header("Location: header.php");
} else {
    header("Location: mand.php");
}