<?php
include "connection.php";
$id = $POST["locatieid"];

$sql = "DELETE FROM locaties WHERE locatieid = :id";
$prepare= $conn->prepare($sql);
$prepare->bindParam(":id", $id);
$prepare->execute();
header("Location: admin.php");