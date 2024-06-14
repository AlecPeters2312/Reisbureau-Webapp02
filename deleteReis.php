<?php
include "connection.php";
$id = $_POST["reisid"];

$sql = "DELETE FROM reizen WHERE reisid = :id";
$prepare= $conn->prepare($sql);
$prepare->bindParam(":id", $id);
$prepare->execute();
header("Location: admin.php");