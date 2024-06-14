<?php
include "connection.php";
$id = $_POST["vluchtid"];

$sql = "DELETE FROM vluchten WHERE vluchtid = :id";
$prepare= $conn->prepare($sql);
$prepare->bindParam(":id", $id);
$prepare->execute();
header("Location: admin.php");